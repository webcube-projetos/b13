<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class ServicosController extends Controller
{
    protected $prefix;

    use MontarPagina;
    use MontarForm;

    public function __construct()
    {
        $this->prefix = 'servicos';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('servicos');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'tipo' => 'Locação',
                'nome' => '5 Horas',
                'categoria' => 'Diária',
                'preco' => 'R$700,00',
            ];
        }

        return new FakeModel($data);
    }

    public function queryCompleta()
    {
        $data = array(
            'id' => '',
            'categoria' => 2,
            'nome' => 'In',
            'categoriaVeiculo' => 1,
            'tipoVeiculo' => 1,
            'blindado' => 1,
            'cep' => '05022-789',
            'precoBase' => 600,
            'horaBase' => 0,
            'precoHoraExtra' => 0,
            'kmBase' => 0,
            'kmExtra' => 0,
            'custoParceiro' => 300,
            'horaExtraParceiro' => 0,
            'kmExtraParceiro' => 0,
            'custoMotorista' => 250,
            'custoHoraExtra' => 0,
        );

        return new FakeModel($data);
    }

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('servicos');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('servicos');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $id = request()->route('id');

        $cliente = $this->queryCompleta()->first() ?? null;
        $dados = $this->montarForm('servicos', $cliente);

        return view('cadastro', compact('dados'));
    }
}
