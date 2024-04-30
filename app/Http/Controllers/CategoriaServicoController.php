<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryType;
use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class CategoriaServicoController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;
    public $request;

    public function __construct(Request $request)
    {
        $this->prefix = 'categorias.servicos';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categorias-servicos');
        $lista = $this->search()->paginate(10);

        $dados = $this->montarForm('categorias-servicos');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }
    public function form()
    {
        $dados = $this->montarForm('categorias-servicos');
        return view('register.formRegisterSingle', compact('dados'));
    }
    public function list()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('categorias-servicos');
        $lista = $this->search()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }

    public function search()
    {
        return Category::query()
            ->select('id', 'name', 'name_english')
            ->withCount('services')
            ->whereHas('type', function ($query) {
                $query->where('name', 'Service');
            });
    }

    public function salvar()
    {
        //validate and respond with errors message
        $this->request->validate([
            'name' => 'required',
            'name_english' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name_english.required' => 'O campo nome em inglês é obrigatório',
        ]);

        $type = CategoryType::where('name', 'Service')->first();

        Category::updateOrCreate([
            'id' => $this->request->id,
        ], [
            'name' => $this->request->name,
            'name_english' => $this->request->name_english,
            'type' => $type->id
        ]);

        return 'categorias-servicos';
    }

    public function editar()
    {
        $categoria = Category::find($this->request->id);
        $dados = $this->montarForm('categorias-servicos', $categoria);
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
        $config = $this->montarPaginaDupla('categorias-servicos');
        $lista = $this->search()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }
}
