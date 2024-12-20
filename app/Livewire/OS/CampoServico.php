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
    public $vehiclesCategory;
    public $nomeServico;
    public $nomeServicoIngles;
    public $typesVehicle;
    /* FIM CAMPOS DE SERVIÇO */

    public $servicoCadastrado = null;
    public $data;

    //Recebe as informações do serviço existente
    public $serviceTemp = null;

    public $serviceId;
    public $type;
    public $idGlobal;
    public $targetClass = CampoServico::class;
    public $lastProcessedEvent = [];

    public function mount($serviceId = null, $type)
    {
        $this->serviceId = $serviceId;
        $data = OsService::find($this->serviceId);

        $this->type = $type;

        if ($data) {
            $this->inicio = $data->start ?? '';
            $this->termino = $data->finish ?? '';
            $this->qtdDias = $data->qtd_days ?? '';
            $this->qtdServices = $data->qtd_service ?? '';
            $this->bilingue = $data->service->bilingual ?? '';
            $this->id_category_service = $data->service->categoryService->id ?? '';
            $this->qtdHoras = $data->time ?? '';
            $this->typesVehicle = $data->service->vehicleType->id ?? '';
            $this->armored = $data->service->blindado_armado ?? '';
            $this->driver = $data->service->driver ?? '';
            $this->nomeServico = $data->nomeServico ?? '';
            $this->nomeServicoIngles = $data->nomeServicoIngles ?? '';
            $this->data = $data;

            //Se o serviço for locação
            if ($data->service->id_service_type === 1) {
                $this->securityType = '';
                $this->vehiclesCategory = $data->service->id_category_espec->id ?? '';
            } else {
                $this->vehiclesCategory = '';
                $this->securityType = $data->service->id_category_espec->id ?? '';
            }
        }
       
    }

    public function updated($property)
    {
        if (in_array($property, ['id_category_service', 'vehiclesCategory', 'typesVehicle', 'securityType', 'armored', 'bilingue', 'qtdHoras', 'driver'])) {
            $this->updateServiceData();
        }
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value, $target = null)
    {
        if ($target) {
            $targetParts = explode('-', $target);
            $id = end($targetParts);

            if ($id != $this->serviceId) {
                return $this->skipRender();
            }
        }

        if (in_array($type, ['empresas', 'languages', 'vehicles', 'employeeSpeciality', 'employee_driver'])) {
            return $this->skipRender();
        }

        $this->{$type} = $value;

        if ($type == 'typesVehicle') {
            $this->updatedTypesVehicle($value);
        }

        $this->updateServiceData();
    }

    public function updateServiceData()
    {
        $this->serviceTemp = $this->buscarServicoCadastrado();

        if ($this->serviceTemp && $this->serviceTemp->price > 0) {
            $this->servicoCadastrado = 1;

            return $this->dispatch('preencherCamposDoServico', $this->serviceTemp, $this->serviceId);
        } else {
            $this->serviceTemp = null;
            $this->servicoCadastrado = 2;
            $this->dispatch('zerarCamposDoServico', $this->serviceId);
        }
    }

    #[On('saveOS')]
    public function saveOS()
    {
        $data = [
            'start' => trim($this->inicio) ?: null,
            'finish' => trim($this->termino) ?: null,
            'qtd_days' => $this->qtdDias,
            'qtd_service' => $this->qtdServices,
            'service' => $this->bilingue,
            'driver' => trim($this->driver) ?: null,
            'id_category_service' => $this->id_category_service,
            'securityType' => trim($this->securityType) ?: null,
            'time' => $this->qtdHoras,
            'id_vehicle' => $this->typesVehicle,
            'name' => trim($this->nomeServico) ?: null,
            'name_english' => trim($this->nomeServicoIngles) ?: null,
            'id_category_espec' => trim($this->vehiclesCategory) ?: null,
            'blindado_armado' => $this->armored,
            'bilingual' => $this->bilingue,
        ];

        //dispatch to Services.php
        $this->dispatch('servicoCreated', $this->serviceId, $this->serviceTemp, $data);
    }

    public function updatedTypesVehicle($value)
    {
        $this->dispatch('typesVehicleUpdated', $value, $this->serviceId);
    }

    private function buscarServicoCadastrado()
    {
        if ($this->type == 'Locação') {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->id_category_service)
                ->where('id_category_espec', $this->vehiclesCategory)
                ->where('id_vehicle', $this->typesVehicle)
                ->where('blindado_armado', $this->armored)
                ->where('bilingual', $this->bilingue)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        } else {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->id_category_service)
                ->where('id_category_espec', $this->securityType)
                ->where('blindado_armado', $this->armored)
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
