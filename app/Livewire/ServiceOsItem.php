<?php

namespace App\Livewire;

use App\Models\OsService;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceOsItem extends Component
{
    public $serviceId;
    public $type;
    public $idGlobal;
    public $inicio;
    public $termino;
    public $qtdDias = 0;
    public $qtdServices = 0;
    public $servicesOS = null;
    public $vehiclesCategory;
    public $selectBrand;
    public $typesVehicle;
    public $similar;
    public $idioma = '';
    public $armored = false;
    public $precoBase = 0;
    public $horaBase = 0;
    public $horaExtra = 0;
    public $kmBase = 0;
    public $kmExtra = 0;
    public $custoParceiro = 0;
    public $extraParceiro = 0;
    public $kmExtraParceiro = 0;
    public $custoEmployee = 0;
    public $horaExtraEmployee = 0;
    public $parceiro = false;
    public $total = 0;
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
            $this->inicio = $data['inicio'];
            $this->termino = $data['termino'];
            $this->qtdDias = $data['qtdDias'];
            $this->qtdServices = $data['qtdServices'] ?? 0;
            $this->servicesOS = $data['servicesOS'];
            $this->vehiclesCategory = $data['vehiclesCategory'];
            $this->typesVehicle = $data['typesVehicle'];
            $this->idioma = $data['idioma'];
            $this->selectBrand = $data['selectBrand'];
            $this->similar = $data['similar'];
            $this->armored = $data['armored'];
            $this->precoBase = $data['precoBase'];
            $this->horaBase = $data['horaBase'];
            $this->horaExtra = $data['horaExtra'];
            $this->kmBase = $data['kmBase'];
            $this->kmExtra = $data['kmExtra'];
            $this->custoParceiro = $data['custoParceiro'];
            $this->extraParceiro = $data['extraParceiro'];
            $this->kmExtraParceiro = $data['kmExtraParceiro'];
            $this->parceiro = $data['parceiro'];
            $this->custoEmployee = $data['custoEmployee'] ?? 0;
            $this->horaExtraEmployee = $data['horaExtraEmployee'] ?? 0;
            $this->total = $data['total'];
        }
    }

    public function handleClonarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }
        $this->data = [
            'inicio' => $this->inicio,
            'termino' => $this->termino,
            'qtdDias' => $this->qtdDias,
            'qtdServices' => $this->qtdServices,
            'servicesOS' => $this->servicesOS,
            'vehiclesCategory' => $this->vehiclesCategory,
            'typesVehicle' => $this->typesVehicle,
            'idioma' => $this->idioma,
            'selectBrand' => $this->selectBrand,
            'similar' => $this->similar,
            'armored' => $this->armored,
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
        $idGlobal = OsService::updateOrCreate(
            ['id' => $this->idGlobal],
            [
                'id_os' => $id,
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
    public function handleSelectUpdated($type, $value)
    {
        $this->{$type} = $value;
    }

    public function updated($property)
    {
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

    public function render()
    {
        return view('livewire.service-os-item');
    }
}
