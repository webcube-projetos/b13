<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class OrcamentosController extends Controller
{
    protected $prefix;

    use MontarPagina;

    public function __construct()
    {
        $this->prefix = 'orcamento';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('orcamento');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function query()
    {
        $faker = Faker::create('pt_BR');
        $data = [];
        $count = 700;
        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                '#' => $count,
                'data_abertura' => $faker->date('d/m/Y'),
                'empresa' => $faker->company,
                'apelido' => '-',
                'valor' => 'R$800,00',
            ];
            $count++;
        }

        return new FakeModel($data);
    }

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('orcamento');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }
}
