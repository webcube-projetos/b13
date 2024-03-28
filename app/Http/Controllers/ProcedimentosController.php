<?php

namespace App\Http\Controllers;

use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Models\Procedure;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class ProcedimentosController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;

    public function __construct()
    {
        $this->prefix = 'categorias.servicos';
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('procedimentos');
        $lista = $this->query()->paginate(10);
        $dados = false;

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function query()
    {
        return Procedure::query()->select('name');
    }
}
