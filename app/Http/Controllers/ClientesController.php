<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\ClientContact;
use App\Models\Contact;
use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
	protected $prefix;
	protected $request;

	use MontarPagina;
	use MontarForm;

	public function __construct(Request $request)
	{
		$this->prefix = 'clientes';
		$this->request = $request;
	}
	public function index()
	{
		$prefix = $this->prefix;

		$dados = $this->search()->paginate(10);

		[$config, $header] = $this->montarPagina('cliente');

		return view('pages.Clients.index', compact('prefix', 'dados', 'config', 'header'));
	}


	public function listar()
	{
		$dados = $this->search()->paginate(10);

		[$config, $header] = $this->montarPagina('clientes');

		return view('pages.Clients.list', compact('dados', 'config', 'header'));
	}

	public function search()
	{
		return Client::query()
			->with(['address', 'contacts']);
	}

	public function cadastro()
	{
		$prefix = $this->prefix;
		$dados = $this->montarForm('clientes');

		return view('cadastro', compact('dados', 'prefix'));
	}

	public function editar()
	{
		$prefix = $this->prefix;
		$id = request()->query('client');

		$cliente = Client::find($id);

		$dados = $this->montarForm('clientes', $cliente);

		return view('cadastro', compact('dados', 'prefix'));
	}


	public function salvar()
	{

		DB::beginTransaction();

		$endereco = Address::create([
			'cep' => $this->request->cep,
			'street' => $this->request->logradouro,
			'number' => $this->request->numero,
			'neighborhood' => $this->request->bairro,
			'city' => $this->request->cidade,
			'state' => $this->request->estado,
			'country' => $this->request->pais,
		]);

		$client = Client::create([
			'id_address' => $endereco->id,
			'document' => $this->request->cpfcnpj,
			'name' => $this->request->razao,
			'fantasy_name' => $this->request->nome_fantasia,
			'nickname' => $this->request->apelido,
		]);

		if ($this->request->nome_contato) {
			foreach ($this->request->nome_contato as $index => $contato) {
				$contato = Contact::create([
					'name' => $contato,
					'email' => $this->request->email_contato[$index],
					'phone' => $this->request->telefone_contato[$index],
					'document' => $this->request->cpf_contato[$index],
					'whatsapp' => $this->request->whatsapp_contato[$index],
					'role' => $this->request->cargo_contato[$index],
				]);

				ClientContact::create([
					'client_id' => $client->id,
					'contact_id' => $contato->id,
				]);
			}
		}

		DB::commit();

		return [
			'route' => route('clientes.editar', $client->id),
		];
	}
}
