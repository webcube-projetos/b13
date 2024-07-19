<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Models\OS;
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

        [$config, $header] = $this->montarPagina('orcamento');
        $config = $config->toArray();
        $header = $header->toArray();

        return view('listagem', compact('prefix', 'config', 'header'));
    }

    public function cadastro()
    {
        $dados = $this->montarForm('orcamentos')->toArray();
        $id = null;

        return view('orcamento', compact('dados', 'id'));
    }

    public function editar()
    {
        $id = $this->request->id;
        $dados = $this->montarForm('orcamentos')->toArray();

        return view('orcamento', compact('dados', 'id'));
    }
}
