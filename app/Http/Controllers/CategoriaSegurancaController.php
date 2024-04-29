<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class CategoriaSegurancaController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;
    public $request;

    public function __construct(Request $request)
    {
        $this->prefix = 'categorias.seguranca';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categoriasSeguranca');
        $lista = $this->query()->paginate(10);
        $dados = $this->montarForm('categorias');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function form()
    {
        $dados = $this->montarForm('categorias');
        return view('register.formRegister', compact('dados'));
    }

    public function list()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categoriasSeguranca');
        $lista = $this->query()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }

    public function query()
    {
        return Category::query()
            ->select('id', 'name', 'description')
            ->withCount('security')
            ->where('type', Category::SECURITY);
    }

    public function salvar()
    {
        $this->request->validate([
            'name' => 'required',
            'name_english' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name_english.required' => 'O campo nome em inglês é obrigatório',
        ]);

        Category::updateOrCreate([
            'id' => $this->request->id,
        ], [
            'name' => $this->request->name,
            'name_english' => $this->request->name_english,
            'description' => $this->request->description ?? null,
            'id_ascendent' => $this->request->id_ascendent ?? null,
        ]);

        return $this->prefix;
    }
}
