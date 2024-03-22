<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class EmpresasController extends Controller
{
    protected $prefix;

    use MontarPagina;
    use MontarForm;

    public function __construct()
    {
        $this->prefix = 'empresas';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('empresas', 'prefix');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function select()
    {
        $faker = Faker::create('pt_BR');
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'id' => $i,
                'nome' => $faker->company
            ];
        }

        return $data;
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
        $prefix = $this->prefix;
        $dados = $this->montarForm('empresas');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $prefix = $this->prefix;
        $id = request()->route('id');

        $cliente = $this->queryCompleta()->first() ?? null;
        $dados = $this->montarForm('empresas', $cliente);

        return view('cadastro', compact('dados', 'prefix'));
    }
}
