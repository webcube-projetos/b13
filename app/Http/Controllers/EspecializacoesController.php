<?php

namespace App\Http\Controllers;

use App\Traits\MontarPaginaDupla;
use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Models\Specialization;
use App\Traits\MontarForm;
use Faker\Factory as Faker;

class EspecializacoesController extends Controller
{
    use MontarPaginaDupla;
    use MontarForm;

    public $prefix;
    protected $request;

    public function __construct(Request $request)
    {
        $this->prefix = 'especializacoes';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('especializacao');
        $lista = $this->query()->paginate(10);
        $dados = $this->montarForm('especializacao');

        return view('paginaDupla', compact('prefix', 'config', 'lista', 'dados'));
    }

    public function form()
    {
        $dados = $this->montarForm('especializacao');
        return view('register.formRegisterSingle', compact('dados'));
    }

    public function list()
    {
        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('especializacao');
        $lista = $this->query()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }

    public function query()
    {
        return Specialization::with(['children' => function ($query) {
            $query->select('id', 'name', 'name_english', 'description', 'id_ascendent')
                ->withCount('drivers');
        }])
            ->whereNull('id_ascendent')
            ->select('id', 'name', 'name_english', 'description')
            ->withCount('drivers');
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

        Specialization::updateOrCreate([
            'id' => $this->request->id,
        ], [
            'name' => $this->request->name,
            'name_english' => $this->request->name_english,
            'description' => $this->request->description ?? null,
            'id_ascendent' => $this->request->id_ascendent ?? null,
        ]);

        return $this->prefix;
    }

    public function editar()
    {
        $specialization = Specialization::find($this->request->id);
        $dados = $this->montarForm('especializacao', $specialization);
        return view('register.formRegisterSingle', compact('dados'));
    }

    public function delete()
    {
        $specialization = Specialization::find($this->request->id);

        if ($specialization) {
            if ($specialization->drivers->count() > 0) {
                $specialization->drivers->delete();
            }
            $specialization->delete();
        }

        $prefix = $this->prefix;
        $config = $this->montarPaginaDupla('especializacao');
        $lista = $this->query()->paginate(10);

        return view('listagem.tableListPage', compact('prefix', 'config', 'lista'));
    }
}
