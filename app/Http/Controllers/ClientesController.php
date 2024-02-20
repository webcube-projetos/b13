<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class ClientesController extends Controller
{
	protected $prefix;

	use MontarPagina;
	use MontarForm;

	public function __construct()
	{
		$this->prefix = 'clientes';
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

		[$config, $header] = $this->montarPagina('cliente');

		return view('listagem.tableList', compact('dados', 'config', 'header'));
	}

	public function cadastro()
	{
		$dados = $this->montarForm('cliente');

		return view('cadastro', compact('dados'));
	}

	public function editar()
	{
		$id = request()->route('id');

		$cliente = $this->queryCompleta()->first() ?? null;
		$dados = $this->montarForm('cliente', $cliente);

		return view('cadastro', compact('dados'));
	}
}
