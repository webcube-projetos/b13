<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use App\Models\Contact;
use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

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

		$dados = $this->query()->paginate(10);

		[$config, $header] = $this->montarPagina('cliente');

		return view('listagem', compact('prefix', 'dados', 'config', 'header'));
	}

	public function query()
	{
		$faker = Faker::create('pt_BR');
		$data = [];

		for ($i = 0; $i < 30; $i++) {
			$data[] = [
				'id' => $i,
				'razao_social' => $faker->company,
				'apelido' => $faker->firstName,
				'cidade' => $faker->city . ' - ' . $faker->stateAbbr,
				'pais' => 'Brasil',
			];
		}

		return new FakeModel($data);
	}

	public function queryCompleta()
	{
		$faker = Faker::create('pt_BR');
		$data = [];

		for ($i = 0; $i < 30; $i++) {
			$data[] = [
				'id' => $i,
				'cpf' => $faker->cpf,
				'razao_social' => $faker->company,
				'nome_fantasia' => $faker->company,
				'apelido' => $faker->firstName,
				'cidade' => $faker->city . ' - ' . $faker->stateAbbr,
				'pais' => 'Brasil',
				'cep' => $faker->postcode,
				'estado' => $faker->stateAbbr,
				'bairro' => $faker->city,
				'telefone' => $faker->phoneNumber,
				'email' => $faker->email,
				'logradouro' => $faker->streetAddress,
				'numero' => $faker->buildingNumber,
			];
		}

		return new FakeModel($data);
	}

	public function listar()
	{
		$dados = $this->query()->paginate(10);

		[$config, $header] = $this->montarPagina('clientes');

		return view('listagem.tableList', compact('dados', 'config', 'header'));
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
		$id = request()->route('id');

		$cliente = $this->queryCompleta()->first() ?? null;
		$dados = $this->montarForm('clientes', $cliente);

		return view('cadastro', compact('dados', 'prefix'));
	}

	public function select()
	{
		$faker = Faker::create('pt_BR');
		$data = [];

		for ($i = 0; $i < 30; $i++) {
			$data[] = [
				'id' => $i,
				'nome' => $faker->firstName . ' ' . $faker->lastName,
			];
		}

		return $data;
	}

	public function salvar()
	{
		$endereco = Address::create([
			'cep' => $this->request->cep,
			'street' => $this->request->logradouro,
			'number' => $this->request->numero,
			'neighborhood' => $this->request->bairro,
			'city' => $this->request->cidade,
			'state' => $this->request->estado,
			'country' => $this->request->pais,
		]);

		foreach ($this->request->nome_contato as $index => $contato) {
			$contato = Contact::create([
				'name' => $contato,
				'email' => $this->request->email_contato[$index],
				'phone' => $this->request->telefone_contato[$index],
				'document' => $this->request->cpf_contato[$index],
				'whatsapp' => $this->request->whatsapp_contato[$index],
				'role' => $this->request->cargo_contato[$index],
			]);
		}

		$client = Client::create([
			'id_address' => $endereco->id,
			'id_contact' => $contato->id,
			'document' => $this->request->cpfcnpj,
			'name' => $this->request->razao,
			'fantasy_name' => $this->request->nome_fantasia,
			'nickname' => $this->request->apelido,
		]);

		return [
			'prefix' => $this->prefix,
			'client' => $client,
		];
	}
}
