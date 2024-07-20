<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\OsService;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceOsItem extends Component
{
    //Gerencia se o serviço existe ou não
    public $servicoCadastrado = null;

    //Recebe as informações do serviço existente
    public $serviceTemp = null;

    public $serviceId;
    public $type;
    public $idGlobal;
    public $parceiro = false;
    public $inicio;
    public $termino;
    public $qtdDias;
    public $qtdServices;
    public $bilingue;
    public $armed;
    public $driver;
    public $categoryService;
    public $securityType;
    public $qtdHoras;
    public $typesVehicle;
    public $vehiclesCategory;
    public $armored;
    public $modelVehicle;
    public $similar;
    public $nomeServico;
    public $nomeServicoIngles;
    public $precoBase;
    public $horaBase;
    public $horaExtra;
    public $kmBase;
    public $kmExtra;
    public $custoParceiro;
    public $extraParceiro;
    public $kmExtraParceiro;
    public $custoEmployee;
    public $horaExtraEmployee;
    public $total;
    public $data = [];

    protected $listeners = [
        'clonarLinha' => 'handleClonarLinha',
        'deletarLinha' => 'handleDeletarLinha',
        'selectUpdated' => 'handleSelectedOptions',
    ];

    public function mount($serviceId, $type, $data = null)
    {
        $this->serviceId = $serviceId;
        $this->data = $data;
        $this->type = $type;

        if ($this->data) {
            $this->parceiro = $data['parceiro'];
            $this->inicio = $data['inicio'];
            $this->termino = $data['termino'];
            $this->qtdDias = $data['qtdDias'];
            $this->qtdServices = $data['qtdServices'];
            $this->bilingue = $data['bilingue'];
            $this->armed = $data['armed'] ?? false;
            $this->driver = $data['driver'] ?? false;
            $this->categoryService = $data['categoryService'] ?? null;
            $this->securityType = $data['securityType'] ?? null;
            $this->qtdHoras = $data['qtdHoras'];
            $this->typesVehicle = $data['typesVehicle'];
            $this->vehiclesCategory = $data['vehiclesCategory'];
            $this->armored = $data['armored'];
            $this->modelVehicle = $data['modelVehicle'];
            $this->similar = $data['similar'];
            $this->nomeServico = $data['nomeServico'] ?? null;
            $this->nomeServicoIngles = $data['nomeServicoIngles'] ?? null;
            $this->precoBase = $data['precoBase'];
            $this->horaBase = $data['horaBase'];
            $this->horaExtra = $data['horaExtra'];
            $this->kmBase = $data['kmBase'];
            $this->kmExtra = $data['kmExtra'];
            $this->custoParceiro = $data['custoParceiro'];
            $this->extraParceiro = $data['extraParceiro'];
            $this->kmExtraParceiro = $data['kmExtraParceiro'];
            $this->custoEmployee = $data['custoEmployee'];
            $this->horaExtraEmployee = $data['horaExtraEmployee'];
            $this->total = $data['total'];
        }
    }

    public function handleClonarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }
        $this->data = [
            'parceiro' => $this->parceiro,
            'inicio' => $this->inicio,
            'termino' => $this->termino,
            'qtdDias' => $this->qtdDias,
            'qtdServices' => $this->qtdServices,
            'bilingue' => $this->bilingue,
            'armored' => $this->armored,
            'driver' => $this->driver,
            'categoryService' => $this->categoryService,
            'securityType' => $this->securityType,
            'qtdHoras' => $this->qtdHoras,
            'typesVehicle' => $this->typesVehicle,
            'vehiclesCategory' => $this->vehiclesCategory,
            'modelVehicle' => $this->modelVehicle,
            'similar' => $this->similar,
            'nomeServico' => $this->nomeServico,
            'nomeServicoIngles' => $this->nomeServicoIngles,
            'precoBase' => $this->precoBase,
            'horaBase' => $this->horaBase,
            'horaExtra' => $this->horaExtra,
            'kmBase' => $this->kmBase,
            'kmExtra' => $this->kmExtra,
            'custoParceiro' => $this->custoParceiro,
            'extraParceiro' => $this->extraParceiro,
            'kmExtraParceiro' => $this->kmExtraParceiro,
            'custoEmployee' => $this->custoEmployee,
            'horaExtraEmployee' => $this->horaExtraEmployee,
            'parceiro' => $this->parceiro,
            'total' => $this->total,
        ];

        $this->dispatch('clonarLinhaparent', $this->serviceId, $this->data);
    }

    public function handleDeletarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }
        $this->dispatch('deletarLinhaparent', $this->serviceId);
    }

    #[On('osCreated')]
    public function saveOS($id)
    {
        if ($this->serviceTemp) {
            $idGlobal = OsService::updateOrCreate(
                ['id' => $this->idGlobal, 'id_service' => $this->serviceTemp->id],
                [
                    'id_os' => $id,
                    'id_service' => $this->serviceTemp->id,
                    'qtd_days' => $this->qtdDias,
                    'qtd_service' => $this->qtdServices,
                    'modelo_veiculo' => $this->modelVehicle,
                    'similar' => $this->similar,
                    'start' => $this->inicio,
                    'finish' => $this->termino,
                    'price' => $this->precoBase,
                    'time' => $this->horaBase,
                    'extra_price' => $this->horaExtra,
                    'km' => $this->kmBase,
                    'km_extra' => $this->kmExtra,
                    'partner_cost' => $this->custoParceiro,
                    'partner_extra_time' => $this->extraParceiro,
                    'partner_extra_km' => $this->kmExtraParceiro,
                    'employee_cost' => $this->custoEmployee,
                    'employee_extra' => $this->horaExtraEmployee,
                ]
            );
        } else {
            // Novo serviço
            $service = Service::create([
                'id_category_service' => $this->categoryService,
                'id_category_espec' => $this->type === 'locacao' ? $this->vehiclesCategory : $this->securityType,
                'id_service_type' => $this->type === 'locacao' ? 1 : 2,
                'id_vehicle' => $this->type === 'locacao' ? $this->typesVehicle : null,
                'name' => $this->nomeServico,
                'name_english' => $this->nomeServicoIngles,
                'blindado_armado' => $this->type === 'locacao' ? $this->armored : $this->armed,
                'bilingual' => $this->bilingue,
                'driver' => $this->driver ?? 0,
                'price' => $this->precoBase,

            $idGlobal = OsService::updateOrCreate(
                ['id' => $this->idGlobal], // Removemos o filtro por id_service aqui
                [
                    'id_os' => $id,
                    'id_service' => $service->id, // Usamos o id do novo serviço criado
                    'qtd_days' => $this->qtdDias,
                    'qtd_service' => $this->qtdServices,
                    'modelo_veiculo' => $this->modelVehicle ?? null,
                    'similar' => $this->similar,
                    'start' => $this->inicio,
                    'finish' => $this->termino,
                    'price' => $this->total,
                    'time' => $this->horaBase,
                    'extra_time' => $this->horaExtra,
                    'km' => $this->kmBase,
                    'km_extra' => $this->kmExtra,
                    'partner_cost' => $this->custoParceiro,
                    'partner_extra_time' => $this->extraParceiro,
                    'partner_extra_km' => $this->kmExtraParceiro,
                    'employee_cost' => $this->custoEmployee,
                    'employee_extra' => $this->horaExtraEmployee,
                ]
            );
        }

        $this->idGlobal = $idGlobal->id;
    }

    #[On('osUpdated')]
    public function handleOsUpdated($id)
    {
        $idGlobal = OsService::updateOrCreate(
            ['id' => $this->serviceId, 'id_os' => $id],
            [
                'id_service' => $this->servicesOS,
                'qtd_days' => $this->qtdDias,
                'start' => $this->inicio,
                'finish' => $this->termino,
                'price' => $this->total,
                'time' => $this->horaBase,
                'extra_time' => $this->horaExtra,
                'km' => $this->kmBase,
                'km_extra' => $this->kmExtra,
                'partner_cost' => $this->custoParceiro,
                'partner_extra_time' => $this->extraParceiro,
                'partner_extra_km' => $this->kmExtraParceiro,
                'employee_cost' => $this->custoEmployee,
                'employee_extra' => $this->horaExtraEmployee,
            ]
        );

        $this->idGlobal = $idGlobal->id;
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($t, $value)
    {
        $this->{$t} = $value;
        $this->updated($t);
    }

    public function updated($property)
    {
        $this->serviceTemp = $this->buscarServicoCadastrado(); // Busca o serviço
        // Lógica condicional para exibição dos campos (Nome/Nome Inglês ou Select):
        if ($this->serviceTemp && $this->serviceTemp->price > 0) {
            $this->preencherCamposDoServico(); // Preenche os campos com os dados do serviço
        } else {
            $this->zerarCamposDoServico();
        }

        $precoBase = (float) str_replace(',', '.', str_replace('.', '', $this->precoBase));
        $qtdDias = (float) str_replace(',', '.', str_replace('.', '', $this->qtdDias));
        $qtdServices = (float) str_replace(',', '.', str_replace('.', '', $this->qtdServices));

        $this->total = $precoBase * $qtdDias * $qtdServices;

        $this->dispatch('custosUpdated', $this->serviceId, [
            'qtdDias' => $this->qtdDias,
            'qtdServices' => $this->qtdServices,
            'precoBase' => $this->precoBase,
            'custoEmployee' => $this->custoEmployee,
            'custoParceiro' => $this->custoParceiro,
            'parceiro' => $this->parceiro,
        ]);

        $this->dispatch('totalUpdated', $this->serviceId, $this->total);
    }

    public function handleSelectedOptions($type, $key)
    {
        $this->{$type} = $key;
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

    private function preencherCamposDoServico()
    {
        $this->servicoCadastrado = 1;
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
        $this->servicoCadastrado = 2;
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
        return view('livewire.service-os-item');
    }
}
