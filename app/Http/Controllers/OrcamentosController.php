<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class OrcamentosController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'orcamento';
        $this->request = $request;
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

    public function cadastro()
    {
        $dados = $this->montarForm('orcamentos')->toArray();

        return view('orcamento', compact('dados'));
    }

    public function editar()
    {
        $id = request()->route('id');

        $cliente = $this->queryCompleta()->first() ?? null;
        $dados = $this->montarForm('orcamento', $cliente);

        return view('orcamento', compact('dados'));
    }
}
