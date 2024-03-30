<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class MotoristasController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'motoristas';
        $this->request = $request;
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

        $data[] = [
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
        ];

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
        $prefix = $this->prefix;
        $id = request()->route('id');

        $motorista = $this->queryCompleta()->first() ?? null;
        $dados = $this->montarForm('motoristas', $motorista);

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function salvar()
    {
        if (!$this->request->foto) {
            $foto = json_decode($this->request->foto);
            $imgUrlFoto = $this->storeImageBase64($foto->data, 'motoristas');
        }
        if ($this->request->cnh) {
            $cnh = json_decode($this->request->cnh);
            $imgUrlCnh = $this->storeImageBase64($cnh->data, 'motoristas');
        }

        if ($this->request->id) {
            $employee = Employee::find($this->request->id);
        }

        $endereco = Address::updateOrCreate(
            [
                'id' => $employee?->id_address ?? null
            ],
            [
                'cep' => $this->request->cep,
                'street' => $this->request->logradouro,
                'number' => $this->request->numero,
                'neighborhood' => $this->request->bairro,
                'city' => $this->request->cidade,
                'state' => $this->request->estado,
                'country' => $this->request->pais,
            ]
        );

        Employee::updateOrCreate(
            ['id' => $this->request->id],
            [
                'type' => Employee::DRIVER,
                'name' => $this->request->name,
                'fantasy_name' => $this->request->fantasy_name ?? null,
                'nickname' => $this->request->nickname ?? null,
                'document' => preg_replace('/[^0-9]/', '', $this->request->document),
                'armed' => null,
                'id_address' => $endereco->id,
                'id_company' => $this->request->id_company ?? null,
                'id_contact' => null,
                'id_bank' => null,
                'obs' => $this->request->obs ?? null,
                'cnh' => $imgUrlCnh,
                'photo' => $imgUrlFoto,
            ]
        );
    }
}
