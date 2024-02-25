<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class MotoristasController extends Controller
{
    protected $prefix;

    use MontarPagina;
    use MontarForm;

    public function __construct()
    {
        $this->prefix = 'motoristas';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('motoristas');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'pessoa-foto' => [
                    'nome' => $faker->firstName . ' ' . $faker->lastName,
                    'foto' => 'https://xsgames.co/randomusers/avatar.php?g=male',
                ],
                'empresa' => $faker->company,
                'cidade' => $faker->city . ' - ' . $faker->stateAbbr,
                'status' => true,
            ];
        }

        return new FakeModel($data);
    }

    public function queryCompleta()
    {
        $faker = Faker::create('pt_BR');

        $data = array(
            'id' => 20,
            'cpfCnpj' => '10.123.456/0001-99',
            'apelido' => 'Jorge da Van',
            'foto' => $faker->imageUrl($width = 640, $height = 480, 'people'),
            'razaoSocial' => 'Jorge Transportes ABC',
            'nomeFantasia' => 'Transportes ABC',
            'cep' => '05022-789',
            'logradouro' => 'Av. Das Rosas',
            'numero' => 516,
            'bairro' => 'Vila Rosa',
            'cidade' => 'São Paulo',
            'estado' => 'SP',
            'pais' => 'Brasil',
            'telefone' => 516,
            'email' => 'Vila Rosa',
            'empresa' => 3,
            'observacao' => 'SP',
            'cnh' => false,
            'dadosBancarios' => [
                'nomeBanco' => 'Itau',
                'numeroBanco' => '0341',
                'agencia' => '1240',
                'contaCorrente' => '0143202-9',
                'tipoChave' => 'CNPJ',
                'chavePix' => '10.123.456/0001-99',
                'prefereReceber' => 2,
            ],
            'especializacao' => [
                [
                    'id_tipo' => 1,
                    'id_valor' => 3,
                ],
                [
                    'id_tipo' => 2,
                    'id_valor' => 5,
                ],
            ]
        );

        return new FakeModel($data);
    }

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('motoristas');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('motoristas');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $id = request()->route('id');

        $cliente = $this->queryCompleta()->first() ?? null;
        $dados = $this->montarForm('motoristas', $cliente);

        return view('cadastro', compact('dados'));
    }
}
