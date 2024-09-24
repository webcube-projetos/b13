<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Models\OS;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;

class OrdemDeServicoController extends Controller
{
    protected $prefix;

    use MontarPagina;
    use MontarForm;

    public function __construct()
    {
        $this->prefix = 'os';
    }

    public function index()
    {
        $prefix = $this->prefix;

        [$config, $header] = $this->montarPagina('os');
        $config = $config->toArray();
        $header = $header->toArray();

        return view('listagem', compact('prefix', 'config', 'header'));
    }

    public function listar()
    {
        $dados = $this->query()->paginate(10);

        [$config, $header] = $this->montarPagina('os');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('os')->toArray();
        $id = null;

        return view('os', compact('dados', 'prefix', 'id'));
    }


    public function editar()
    {
        $id = request()->route('id');

        $cliente = OS::where('id', $id)
            ->first();

        $dados = $this->montarForm('os', $cliente)->toArray();

        return view('os', compact('dados', 'id'));
    }
}
