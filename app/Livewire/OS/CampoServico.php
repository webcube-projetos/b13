<?php

namespace App\Livewire\OS;

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
    public $categoryService;
    public $securityType;
    public $qtdHoras;
    public $typesVehicle;
    public $vehiclesCategory;
    public $nomeServico;
    public $nomeServicoIngles;
    /* FIM CAMPOS DE SERVIÇO */

    public $servicoCadastrado = null;
    public $data;

    //Recebe as informações do serviço existente
    public $serviceTemp = null;

    public $vehiclesOptions = null;

    public $serviceId;
    public $type;
    public $idGlobal;

    public function mount($data = null)
    {
        if ($data) {
            $this->data = $data;
            $this->inicio = $data['inicio'] ?? '';
            $this->termino = $data['termino'] ?? '';
            $this->qtdDias = $data['qtdDias'] ?? '';
            $this->qtdServices = $data['qtdServices'] ?? '';
            $this->bilingue = $data['bilingue'] ?? '';
            $this->driver = $data['driver'] ?? '';
            $this->categoryService = $data['categoryService'] ?? '';
            $this->securityType = $data['securityType'] ?? '';
            $this->qtdHoras = $data['qtdHoras'] ?? '';
            $this->typesVehicle = $data['typesVehicle'] ?? '';
            $this->vehiclesCategory = $data['vehiclesCategory'] ?? '';
            $this->armored = $data['armored'] ?? '';
            $this->nomeServico = $data['nomeServico'] ?? '';
            $this->nomeServicoIngles = $data['nomeServicoIngles'] ?? '';
        }

        $this->updateVehiclesOptions(); // Inicializar as opções de veículos

    }

    public function updatedTypesVehicle()
    {
        $this->updateVehiclesOptions(); // Atualizar as opções quando typesVehicle mudar
    }

    private function updateVehiclesOptions()
    {
        if ($this->typesVehicle) {
            $this->vehiclesOptions = Vehicle::select('vehicles.id', 'vehicles.plate', 'vehicle_brands.name as brand_name', 'vehicles.model')
                ->join('vehicle_brands', 'vehicles.id_brand', '=', 'vehicle_brands.id')
                ->where('vehicles.id_type', $this->typesVehicle) // Filtrar pelo tipo de veículo
                ->orderBy('vehicle_brands.name', 'asc')
                ->get();
        } else {
            $this->vehiclesOptions = []; // Limpar as opções se nenhum tipo de veículo for selecionado
        }
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
            $this->dispatch('preencherCamposDoServico');
        } else {
            $this->dispatch('zerarCamposDoServico');
            $this->servicoCadastrado = 2;
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
        if ($this->type == 'locacao') {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->categoryService)
                ->where('id_category_espec', $this->vehiclesCategory)
                ->where('id_vehicle', $this->typesVehicle)
                ->where('blindado_armado', $this->armored)
                ->where('bilingual', $this->bilingue)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        } else {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->categoryService)
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
        return view('livewire.o-s.campo-servico');
    }
}
