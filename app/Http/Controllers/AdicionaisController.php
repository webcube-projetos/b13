<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class AdicionaisController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;
    protected $request;

    public function __construct(Request $request)
    {
        $this->prefix = 'adicionais';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('adicionais');
        $lista = $this->search()->paginate(10);
        $dados = $this->montarForm('adicionais');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function form()
    {
        $dados = $this->montarForm('adicionais');
        return view('register.formRegisterSingle', compact('dados'));
    }
    public function list()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('adicionais');
        $lista = $this->search()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }

    public function search()
    {
        return Additional::query()
            ->select('id', 'name', 'name_english', 'description')
            ->withCount('vehicles');
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

        Additional::updateOrCreate([
            'id' => $this->request->id,
        ], [
            'name' => $this->request->name,
            'name_english' => $this->request->name_english,
            'description' => $this->request->description ?? null,
        ]);

        return 'adicionais';
    }

    public function editar()
    {
        $adicional = Additional::find($this->request->id);
        $dados = $this->montarForm('adicionais', $adicional);
        return view('register.formRegisterSingle', compact('dados'));
    }

    public function delete()
    {
        $adicional = Additional::find($this->request->id);

        if ($adicional) {
            if ($adicional->vehicles->count() > 0) {
                $adicional->vehicles->delete();
            }
            $adicional->delete();
        }

        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('adicionais');
        $lista = $this->search()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }
}
