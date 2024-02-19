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
				'razao_social' => $faker->company,
				'apelido' => $faker->firstName,
				'cidade' => $faker->city . ' - ' . $faker->stateAbbr,
				'pais' => 'Brasil',
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

	public function cadastro(){

		$dados = $this->montarForm('cliente');

		return view('cadastro', compact('dados'));
	}
}
