<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryType;
use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class CategoriaController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;
    public $request;

    public function __construct(Request $request)
    {
        $this->prefix = 'categorias.veiculos';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categorias');
        $lista = $this->search()->paginate(10);
        $dados = $this->montarForm('categorias');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function form()
    {
        $dados = $this->montarForm('categorias');
        return view('register.formRegisterSingle', compact('dados'));
    }
    public function list()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categorias');
        $lista = $this->search()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }

    public function search()
    {
        return Category::query()
            ->select('id', 'name', 'name_english', 'description')
            ->withCount('vehicles')
            ->whereHas('type', function ($query) {
                $query->where('name', 'Vehicle');
            });
    }

    public function salvar()
    {
        $this->request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório',
        ]);

        $type = CategoryType::where('name', 'Vehicle')->first();

        Category::updateOrCreate([
            'id' => $this->request->id,
        ], [
            'name' => $this->request->name,
            'name_english' => $this->request->name_english,
            'description' => $this->request->description ?? null,
            'type' => $type->id
        ]);

        return 'categorias-veiculos';
    }

    public function editar()
    {
        $categoria = Category::find($this->request->id);
        $dados = $this->montarForm('categorias', $categoria);
        return view('register.formRegisterSingle', compact('dados'));
    }

    public function delete()
    {
        $categoria = Category::find($this->request->id);

        if ($categoria) {
            if ($categoria->services->count() > 0) {
                abort(403, 'Esta categoria contém servicos');
            }
            $categoria->delete();
        }

        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categorias');
        $lista = $this->search()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }
}
