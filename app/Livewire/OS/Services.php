<?php

namespace App\Livewire\OS;

use Livewire\Component;
use App\Models\Service;
use App\Models\Vehicle;
use Livewire\Attributes\On;

class Services extends Component
{
    //Gerencia se o serviço existe ou não
    public $servicoCadastrado = null;

    //Recebe as informações do serviço existente
    public $serviceTemp = null;

    public $vehiclesOptions = null;

    public $serviceId;
    public $type;
    public $idGlobal;

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

    /* CAMPOS DE EXECUÇÃO */
    public $day;
    public $identification;
    public $execucacao;
    public $employeeLanguage;
    public $employeeSpeciality;
    public $employee; 
    public $vehicleModel; 
    public $empresas;
    public $horarioInicio; 
    public $horarioTermino; 
    public $horasExcedidas; 
    public $kmInicio; 
    public $kmTermino; 
    public $kmPercorridos; 
    public $kmExcedidos; 
    public $pedagio; 
    public $estacionamento; 
    public $despesas; 
    /* FIM CAMPOS DE EXECUÇÃO */

    /* CAMPOS DE PREÇOS */
    public $precoBase;
    public $horaExtra;
    public $kmBase;
    public $kmExtra;
    public $custoParceiro;
    public $extraParceiro;
    public $kmExtraParceiro;
    public $custoEmployee;
    public $horaExtraEmployee;
    /* FIM CAMPOS DE PREÇOS */

    public $total;
    public $data = [];

    protected $listeners = [
        'selectUpdated' => 'handleSelectUpdated',
    ];

    public function mount($data = null) {

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

            $this->day = $data['day'] ?? '';
            $this->identification = $data['identification'] ?? '';
            $this->execucacao = $data['execucacao'] ?? '';
            $this->employeeLanguage = $data['employeeLanguage'] ?? '';
            $this->employeeSpeciality = $data['employeeSpeciality'] ?? '';
            $this->employee = $data['employee'] ?? ''; 
            $this->vehicleModel = $data['vehicleModel'] ?? ''; 
            $this->empresas = $data['empresas'] ?? '';
            $this->horarioInicio = $data['horarioInicio'] ?? ''; 
            $this->horarioTermino = $data['horarioTermino'] ?? ''; 
            $this->horasExcedidas = $data['horasExcedidas'] ?? ''; 
            $this->kmInicio = $data['kmInicio'] ?? ''; 
            $this->kmTermino = $data['kmTermino'] ?? ''; 
            $this->kmPercorridos = $data['kmPercorridos'] ?? ''; 
            $this->kmExcedidos = $data['kmExcedidos'] ?? ''; 
            $this->pedagio = $data['pedagio'] ?? ''; 
            $this->estacionamento = $data['estacionamento'] ?? ''; 
            $this->despesas = $data['despesas'] ?? ''; 

            $this->precoBase = $data['precoBase'] ?? '';
            $this->kmBase = $data['kmBase'] ?? '';
            $this->kmExtra = $data['kmExtra'] ?? '';
            $this->custoParceiro = $data['custoParceiro'] ?? '';
            $this->extraParceiro = $data['extraParceiro'] ?? '';
            $this->kmExtraParceiro = $data['kmExtraParceiro'] ?? '';
            $this->custoEmployee = $data['custoEmployee'] ?? '';
            $this->horaExtraEmployee = $data['horaExtraEmployee'] ?? '';
        }

        $this->updateVehiclesOptions(); // Inicializar as opções de veículos
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        $this->{$type} = $value;
        dd($type);
        $this->updateServiceData(); // Chama a função para atualizar os dados do serviço
    }

    public function updated($property)
    {
        if (in_array($property, ['categoryService', 'vehiclesCategory', 'typesVehicle', 'securityType', 'armored', 'bilingue', 'qtdHoras', 'driver'])) {
            $this->updateServiceData();
        }

        /*elseif (in_array($property, ['parceiro', 'qtdDias', 'qtdServices', 'precoBase', 'custoParceiro', 'custoEmployee'])) {
            $this->updateCostsAndTotal();
        }*/
    }

    public function updateServiceData()
    {
        $this->serviceTemp = $this->buscarServicoCadastrado();
        if ($this->serviceTemp && $this->serviceTemp->price > 0) {
            $this->preencherCamposDoServico();
        } else {
            $this->zerarCamposDoServico();
            $this->servicoCadastrado = 2;
        }
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
            //dd($this->categoryService, $this->securityType, $this->armed, $this->bilingue, $this->driver, $this->qtdHoras);
            return Service::where('id_category_service', $this->categoryService)
                ->where('id_category_espec', $this->securityType)
                ->where('blindado_armado', $this->armed)
                ->where('bilingual', $this->bilingue)
                ->where('driver', $this->driver)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        }
    }

    private function preencherCamposDoServico()
    {
        $this->servicoCadastrado = 1;
        
        $clonedService = clone $this->serviceTemp; 

        $this->precoBase = $this->serviceTemp->price;
        $this->horaExtra = $this->serviceTemp->extra_price;
        $this->kmBase = $this->serviceTemp->km;
        $this->kmExtra = $this->serviceTemp->km_extra;
        $this->custoParceiro = $this->serviceTemp->partner_cost;
        $this->extraParceiro = $this->serviceTemp->partner_extra_time;
        $this->kmExtraParceiro = $this->serviceTemp->partner_extra_km;
        $this->custoEmployee = $this->serviceTemp->employee_cost;
        $this->horaExtraEmployee = $this->serviceTemp->employee_extra;
    }

    private function zerarCamposDoServico()
    {
        $this->precoBase = 0;
        $this->horaExtra = 0;
        $this->kmBase = 0;
        $this->kmExtra = 0;
        $this->custoParceiro = 0;
        $this->extraParceiro = 0;
        $this->kmExtraParceiro = 0;
        $this->custoEmployee = 0;
        $this->horaExtraEmployee = 0;
    }

    public function render()
    {
        return view('livewire.o-s.services', [
            'vehiclesOptions' => $this->vehiclesOptions, // Passar as opções para a view
        ]);
    }
}
