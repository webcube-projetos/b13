<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Models\FakeModel;
use App\Models\Vehicle;
use App\Models\VehicleAdditional;
use Faker\Factory as Faker;
use App\Traits\MontarPagina;
use App\Traits\MontarForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class VeiculosController extends Controller
{
    protected $prefix;
    protected $request;

    use MontarPagina;
    use MontarForm;

    public function __construct(Request $request)
    {
        $this->prefix = 'veiculos';
        $this->request = $request;
    }
    public function index()
    {
        $prefix = $this->prefix;

        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('veiculos');

        return view('pages.Vehicles.index', compact('prefix', 'dados', 'config', 'header'));
    }

    public function search()
    {
        return Vehicle::query();
    }

    public function listar()
    {
        $dados = $this->search()->paginate(10);

        [$config, $header] = $this->montarPagina('veiculos');

        return view('pages.Vehicles.list', compact('dados', 'config', 'header'));
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

        return view('cadastro', compact('dados', 'prefix', 'veiculo'));
    }

    public function salvar()
    {
        $imgUrlFoto = null;
        $imgUrldoc_photo = null;

        DB::beginTransaction();
        if ($this->request->photo) {
            $photo = json_decode($this->request->photo);
            $imgUrlFoto = $this->storeImageBase64($photo->data, 'motoristas');
        }
        if ($this->request->doc_photo) {
            $doc_photo = json_decode($this->request->doc_photo);
            $imgUrldoc_photo = $this->storeImageBase64($doc_photo->data, 'motoristas');
        }

        if ($this->request->id) {
            $vehicle = Vehicle::find($this->request->id);
        }

        $vehicle = Vehicle::updateOrCreate(
            ['id' => $this->request->id],
            [
                'id_type' => $this->request->id_type,
                'id_category' => $this->request->id_category ?? null,
                'id_brand' => $this->request->id_brand ?? null,
                'model' => $this->request->model ?? null,
                'color' => $this->request->color ?? null,
                'year' => $this->request->year ?? null,
                'armored' => $this->request->armored ?? null,
                'plate' => $this->request->plate ?? null,
                'passengers' => $this->request->passengers ?? null,
                'bags' => $this->request->bags ?? null,
                'expiration_date' => $this->request->expiration_date ?? null,
                'insurance' => $this->request->insurance ?? null,
                'id_company' => $this->request->id_company ?? null,
            ]
        );

        // Atualize o URL da foto somente se uma nova foto foi enviada
        if ($imgUrlFoto) {
            $vehicle->photo = $imgUrlFoto;
        }

        // Atualize o URL do documento somente se um novo documento foi enviado
        if ($imgUrldoc_photo) {
            $vehicle->doc_photo = $imgUrldoc_photo;
        }

        // Salve o veículo
        $vehicle->save();

        if (!empty($this->request->id_aditional)) {
            foreach ($this->request->id_aditional as $index => $adicional) {
                $adicional = Additional::find($adicional);

                if (!$adicional) continue;

                VehicleAdditional::updateOrCreate([
                    'vehicle_id' => $vehicle->id,
                    'additional_id' => $adicional->id,
                ]);
            }
        }

        DB::commit();

        return [
            'route' => route('veiculos.editar', ['veiculos' => $vehicle->id]),
        ];
    }

    public function delete()
    {
        $vehicle = Vehicle::find($this->request->id);

        if ($vehicle) {

            if ($vehicle->additionals->count() > 0) {
                VehicleAdditional::where('vehicle_id', $vehicle->id)->delete();
            }

            $vehicle->delete();
        }

        return $this->listar();
    }
}
