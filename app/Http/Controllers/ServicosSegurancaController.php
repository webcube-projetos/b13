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

class ServicosSegurancaController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'servicos-seguranca';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('servicosSeguranca');

        return view('pages.ServicesSeguranca.index', compact('prefix', 'dados', 'config', 'header'));
    }

    public function search()
    {
        return Service::query()
        ->where('id_service_type', 2);
    }

    public function listar()
    {
        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('servicosSeguranca');

        return view('pages.ServicesSeguranca.list', compact('dados', 'config', 'header'));
    }

    public function cadastro()
    {
        $prefix = $this->prefix;
        $dados = $this->montarForm('servicosSeguranca');

        return view('cadastro', compact('dados', 'prefix'));
    }

    public function editar()
    {
        $prefix = $this->prefix;
        $id = request()->query('servicos');

        $servico = Service::find($id);
        $dados = $this->montarForm('servicosSeguranca', $servico);

        return view('cadastro', compact('dados', 'prefix', 'servico'));
    }

    public function salvar()
    {
        DB::beginTransaction();

        try {
            $service = null;

            // Verifica se está editando um serviço existente
            if ($this->request->id) {
                $service = Service::find($this->request->id);
            }

            // Encontra o tipo de serviço pelo nome
            $serviceType = ServiceType::where('name', $this->request->id_service_type)->first();

            if (!$serviceType) {
                throw new \Exception('Tipo de serviço não encontrado.');
                return response()->json(['route' => route('servicos.cadastro')]);
            }
           
            // Monta os dados do serviço
            $data = [
                'name' => $this->request->name,
                'name_english' => $this->request->name_english ?? null,
                'blindado_armado' => $this->request->armored,
                'bilingual' => $this->request->bilingual,
                'driver' => $this->request->driver,
                'price' => $this->request->price * 100,
                'time' => $this->request->time,
                'extra_price' => $this->request->extra_price * 100,
                'km' => $this->request->km,
                'km_extra' => $this->request->km_extra * 100,
                'partner_cost' => $this->request->partner_cost * 100,
                'partner_extra_time' => $this->request->partner_extra_time * 100,
                'partner_extra_km' => $this->request->partner_extra_km * 100,
                'employee_cost' => $this->request->employee_cost * 100,
                'employee_extra' => $this->request->employee_extra * 100,
                'id_category_service' => $this->request->id_category_service,
                'id_category_espec' => $this->request->id_category_espec ?? null,
                'id_service_type' => $serviceType->id,
                'id_vehicle' => $this->request->id_vehicle ?? null,
            ];

            // Cria ou atualiza o serviço
            $service = Service::updateOrCreate(
                ['id' => $this->request->id],
                $data
            );

            DB::commit();

            // Retorna o redirecionamento para a rota de edição com o ID do serviço
            //return response()->json(['route' => route('servicos.seguranca.editar', ['servicos' => $service->id])]);
            return redirect()->route('servicos.seguranca.editar', ['servicos' => $service->id]);

        } catch (\Exception $e) {
            DB::rollBack();
            // Lidar com a exceção de acordo com suas necessidades, por exemplo, logando o erro e retornando uma resposta adequada
            return response()->json(['error' => 'Erro ao salvar o serviço: ' . $e->getMessage()], 500);
        }
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
