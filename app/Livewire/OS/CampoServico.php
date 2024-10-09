<?php

namespace App\Livewire\OS;

use App\Models\Category;
use App\Models\OsService;
use App\Models\Service;
use App\Models\Vehicle;
use Livewire\Attributes\On;
use Livewire\Component;

class CampoServico extends Component
{
    /* CAMPOS DE SERVIÇO */
    public $inicio;
    public $termino;
    public $qtdDias;
    public $qtdServices;
    public $bilingue;
    public $armored;
    public $armed;
    public $driver;
    public $id_category_service;
    public $securityType;
    public $qtdHoras;
    public $id_vehicle;
    public $id_category_espec;
    public $nomeServico;
    public $nomeServicoIngles;
    /* FIM CAMPOS DE SERVIÇO */

    public $servicoCadastrado = null;
    public $data;

    //Recebe as informações do serviço existente
    public $serviceTemp = null;

    public $serviceId;
    public $type;
    public $idGlobal;

    public function mount($serviceId = null)
    {
        $this->serviceId = $serviceId;
        $data = OsService::find($this->serviceId);

        $this->type = $data->service->serviceType->name;

        if ($data) {
            $this->inicio = $data->start ?? '';
            $this->termino = $data->finish ?? '';
            $this->qtdDias = $data->qtd_days ?? '';
            $this->qtdServices = $data->qtd_service ?? '';
            $this->bilingue = $data->service->bilingual ?? '';
            $this->driver = $data->driver ?? '';
            $this->id_category_service = $data->service->categoryService->id ?? '';
            $this->securityType = $data->securityType ?? '';
            $this->qtdHoras = $data->time ?? '';
            $this->id_vehicle = $data->service->vehicleType->id ?? '';
            $this->id_category_espec = $data->service->categoryEspec->id ?? '';
            $this->armored = $data->service->blindado_armado ?? '';
            $this->nomeServico = $data->nomeServico ?? '';
            $this->nomeServicoIngles = $data->nomeServicoIngles ?? '';
            $this->data = $data;
        }
    }

    #[On('saveOS')]
    public function saveOS()
    {
        $data = [
            'start' => $this->inicio,
            'finish' => $this->termino,
            'qtd_days' => $this->qtdDias,
            'qtd_service' => $this->qtdServices,
            'service' => $this->bilingue,
            'driver' => $this->driver,
            'id_category_service' => $this->id_category_service,
            'securityType' => $this->securityType,
            'time' => $this->qtdHoras,
            'id_vehicle' => $this->id_vehicle,
            'id_category_espec' => $this->id_category_espec,
            'blindado_armado' => $this->armored,
        ];

        $this->dispatch('servicoCreated', $this->serviceId, $data);
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (in_array($type, ['empresas', 'languages', 'vehicles', 'employeeSpeciality', 'employee_driver'])) {
            return $this->skipRender();
        }

        $this->{$type} = $value;
        $this->updateServiceData();
    }

    public function updateServiceData()
    {
        $this->serviceTemp = $this->buscarServicoCadastrado();

        if ($this->serviceTemp && $this->serviceTemp->price > 0) {
            return $this->dispatch('preencherCamposDoServico', $this->serviceTemp, $this->serviceId);
        } else {
            $this->serviceTemp = null;
            $this->servicoCadastrado = 2;
            $this->dispatch('zerarCamposDoServico');
        }
    }

    public function updated($property)
    {
        if (in_array($property, ['categoryService', 'vehiclesCategory', 'typesVehicle', 'securityType', 'armored', 'bilingue', 'qtdHoras', 'driver'])) {
            $this->updateServiceData();
        }
    }

    private function buscarServicoCadastrado()
    {
        if ($this->type == 'Locação') {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->id_category_service)
                ->where('id_category_espec', $this->id_category_espec)
                ->where('id_vehicle', $this->id_vehicle)
                ->where('blindado_armado', $this->armored)
                ->where('bilingual', $this->bilingue)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        } else {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->id_category_service)
                ->where('id_category_espec', $this->securityType)
                ->where('blindado_armado', $this->armed)
                ->where('bilingual', $this->bilingue)
                ->where('driver', $this->driver)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        }
    }

    public function render()
    {
        $serviceTypes = Category::where('type', 2)->get();

        return view('livewire.o-s.campo-servico', compact('serviceTypes'));
    }
}
