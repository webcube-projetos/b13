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
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'os';
        $this->request = $request;
    }

    public function index()
    {
        $prefix = $this->prefix;

        [$config, $header] = $this->montarPagina('os');
        $config = $config->toArray();
        $header = $header->toArray();
        $type = 'os';

        return view('listagem', compact('prefix', 'config', 'header', 'type'));
    }

    public function listar()
    {
        $dados = $this->query()->where('status', 5)->paginate(10);

        [$config, $header] = $this->montarPagina('os');

        $type = 'os';

        return view('listagem.tableList', compact('dados', 'config', 'header', 'type'));
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
        $id = $this->request->id;

        $cliente = OS::where('id', $id)
            ->first();

        $dados = $this->montarForm('os', $cliente)->toArray();

        return view('os', compact('dados', 'id'));
    }
}
