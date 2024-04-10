<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Models\Vehicle;
use Faker\Factory as Faker;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;

class VeiculosController extends Controller
{
    protected $prefix;

    use MontarPagina;
    use MontarForm;

    public function __construct()
    {
        $this->prefix = 'veiculos';
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('veiculos');

        return view('listagem', compact('prefix', 'dados', 'config', 'header'));
    }

    public function search()
    {
        return Vehicle::query();
    }

    public function listar()
    {
        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('veiculos');

        return view('listagem.tableList', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('veiculos');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $prefix = $this->prefix;
        $id = request()->query('veiculos');

        $veiculo = Vehicle::find($id);
        $dados = $this->montarForm('veiculos', $veiculo);

        return view('cadastro', compact('dados', 'prefix'));
    }
}
