<?php

namespace App\Http\Controllers;

use App\Models\FakeModel;
use App\Models\Service;
use App\Models\ServiceType;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ServicosController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'servicos';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('servicos');

        return view('pages.Services.index', compact('prefix', 'dados', 'config', 'header'));
    }

    public function search()
    {
        return Service::query();
    }

    public function listar()
    {
        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('servicos');

        return view('pages.Services.list', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('servicos');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $prefix = $this->prefix;
        $id = request()->query('servicos');

        $servico = Service::find($id);
        $dados = $this->montarForm('servicos', $servico);

        return view('cadastro', compact('dados', 'prefix', 'servico'));
    }

    public function salvar()
    {
        DB::beginTransaction();

        if ($this->request->id) {
            $service = Service::find($this->request->id);
        }

        $serviceType = ServiceType::where('name', $this->request->id_service_type)->first();

        $service = Service::updateOrCreate(
            ['id' => $this->request->id],
            [
                'name' => $this->request->name,
                'name_english' => $this->request->name_english ?? null,
                'blindado_armado' => $this->request->armored,
                'price' => $this->request->price,
                'time' => $this->request->time,
                'extra_price' => $this->request->extra_price,
                'km' => $this->request->km,
                'km_extra' => $this->request->km_extra,
                'partner_cost' => $this->request->partner_cost,
                'partner_extra_time' => $this->request->partner_extra_time,
                'partner_extra_km' => $this->request->partner_extra_km,
                'employee_cost' => $this->request->employee_cost,
                'employee_extra' => $this->request->employee_extra,
                'id_category_service' => $this->request->id_category_service,
                'id_category_espec' => $this->request->id_category_espec ?? null,
                'id_service_type' => $serviceType->id,
                'id_vehicle' => $this->request->id_vehicle ?? null,
            ]
        );
        DB::commit();

        return [
            'route' => route('servicos.editar', ['servicos' => $service->id]),
        ];
    }

    public function delete()
    {
        $service = Service::find($this->request->id);

        if ($service) {

            $service->delete();
        }

        return $this->listar();
    }
}
