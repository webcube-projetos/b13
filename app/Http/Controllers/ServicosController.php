<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class ServicosController extends Controller
{
    protected $prefix;

    use MontarPagina;

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

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('servicos');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }
}
