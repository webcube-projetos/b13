<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\BankAccount;
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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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

		$client = $this->request->id ? Client::find($this->request->id) : new Client();

		if ($this->request->tipo == 'bank') {
			$bank = BankAccount::updateOrCreate(
				[
					'id' => $this->request->id_bank ?? null
				],
				[
					'bank' => $this->request->nome_banco ?? null,
					'bank_number' => $this->request->numero_banco ?? null,
					'agency' => $this->request->agencia ?? null,
					'cc' => $this->request->conta ?? null,
					'key_type' => $this->request->tipo_chave ?? null,
					'key' => $this->request->chave_pix ?? null,
					'preference' => $this->request->preference ?? null,
				]
			);

			$client->id_bank = $bank->id;
			$client->save();
			DB::commit();

			return [
				'route' => route('clientes.editar', ['client' => $client->id]),
			];
		}

		$endereco = Address::updateOrCreate(
			[
				'id' => $client?->id_address ?? null
			],
			[
				'cep' => $this->request->cep,
				'street' => $this->request->logradouro,
				'number' => $this->request->numero,
				'complement' => $this->request->complement,
				'neighborhood' => $this->request->bairro,
				'city' => $this->request->cidade,
				'state' => $this->request->estado,
				'country' => $this->request->pais,
			]
		);

		$client->fill([
			'id_address' => $endereco->id,
			'document' => preg_replace('/[^0-9]/', '', $this->request->cpfcnpj),
			'name' => $this->request->razao,
			'fantasy_name' => $this->request->nome_fantasia,
			'nickname' => $this->request->apelido,
			'phone' => $this->request->phone,
			'email' => $this->request->email,
		]);
		$client->save();

		$existingContactIds = $client->contacts->pluck('id')->toArray();
    	$requestContactIds = $this->request->id_contato ?? [];

		// Atualizar ou criar contatos
		if ($this->request->nome_contato) {
			foreach ($this->request->nome_contato as $index => $contato) {
				$contact = Contact::updateOrCreate(
					[
						'id' => $this->request->id_contato[$index] ?? null
					],
					[
						'name' => $contato,
						'email' => $this->request->email_contato[$index],
						'phone' => $this->request->telefone_contato[$index],
						'document' => $this->request->cpf_contato[$index],
						'whatsapp' => $this->request->whatsapp_contato[$index],
						'role' => $this->request->cargo_contato[$index],
					]
				);

				if (!$this->request->id_contato[$index]) {
					ClientContact::create([
						'client_id' => $client->id,
                    	'contact_id' => $contact->id,
					]);
				}

				// Remover do array de IDs existentes para que não seja deletado
				if (($key = array_search($contact->id, $existingContactIds)) !== false) {
					unset($existingContactIds[$key]);
				}
			}
		}

		// Remover contatos que não estão mais presentes na solicitação
		if (!empty($existingContactIds)) {
			ClientContact::whereIn('contact_id', $existingContactIds)->delete();
			Contact::destroy($existingContactIds);
		}

		DB::commit();

		return [
			'route' => route('clientes.editar', ['client' => $client->id]),
		];
	}
	
	public function delete()
	{
		$client = Client::find($this->request->id);

		if (!$client) {
			return redirect()->back()->with('error', 'Cliente não encontrado.');
		}

		DB::beginTransaction();

		try {
			// Obter o endereço associado ao cliente
			$address = $client->address;

			// Chamando a função para excluir o cliente e seu endereço associado
			$this->deleteClientAndAssociatedAddress($client, $address);

			DB::commit();

			return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso.');

		} catch (\Exception $e) {
			DB::rollback();
			// Lidar com erros, logar ou notificar
			Log::error('Erro ao excluir cliente: ' . $e->getMessage());
			return redirect()->back()->with('error', 'Erro ao excluir cliente: ' . $e->getMessage());
		}
	}

	public function deleteClientAndAssociatedAddress(Client $client, Address $address)
	{
		DB::beginTransaction();

		try {
			// Remover contatos associados ao cliente
			foreach ($client->contacts as $contact) {
				ClientContact::where('contact_id', $contact->id)->delete();
				$contact->delete();
			}

			// Excluir o cliente
			$client->delete();

			// Agora que o cliente foi excluído, podemos excluir o endereço
			$address->delete();

			DB::commit();

			return true; // Operação concluída com sucesso
		} catch (\Exception $e) {
			DB::rollback();
			// Lidar com erros, logar ou notificar
			Log::error('Erro ao excluir cliente e endereço associado: ' . $e->getMessage());
			return false;
		}
	}
}
