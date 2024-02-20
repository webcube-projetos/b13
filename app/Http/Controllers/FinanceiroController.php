<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class FinanceiroController extends Controller
{
    protected $prefix;

    use MontarPagina;

    public function __construct()
    {
        $this->prefix = 'financeiro';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('financeiro');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'tipo' => 'Entrada',
                'data_previsao' => $faker->date('d/m/Y'),
                'empresa' => $faker->company,
                'apelido' => '-',
                'valor' => 'R$800,00',
                'status' => $faker->boolean,
            ];
        }

        return new FakeModel($data);
    }

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('financeiro');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }
}
