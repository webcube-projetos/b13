<?php

namespace App\Livewire;

use App\Models\OsService;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceOsLocacao extends Component
{
    public $serviceId;
    public $id_locacao;
    public $inicio;
    public $termino;
    public $qtdDias = 0;
    public $qtdVeiculos = 0;
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
    public $custoMotorista = 0;
    public $horaExtraMotorista = 0;
    public $total = 0;
    public $data = [];


    protected $listeners = [
        'clonarLinha' => 'handleClonarLinha',
        'deletarLinha' => 'handleDeletarLinha',
        'selectUpdated' => 'handleSelectedOptions',
    ];

    public function mount($serviceId, $data = null)
    {
        $this->serviceId = $serviceId;
        $this->data = $data;

        if ($this->data) {
            $this->inicio = $data['inicio'];
            $this->termino = $data['termino'];
            $this->qtdDias = $data['qtdDias'];
            $this->qtdVeiculos = $data['qtdVeiculos'];
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
            $this->custoMotorista = $data['custoMotorista'];
            $this->horaExtraMotorista = $data['horaExtraMotorista'];
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
            'qtdVeiculos' => $this->qtdVeiculos,
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
            'custoMotorista' => $this->custoMotorista,
            'horaExtraMotorista' => $this->horaExtraMotorista,
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

    public function updated($property)
    {
        $this->total = $this->precoBase + $this->horaBase + $this->horaExtra + $this->kmBase + $this->kmExtra + $this->custoParceiro + $this->extraParceiro + $this->kmExtraParceiro + $this->custoMotorista + $this->horaExtraMotorista;

        $this->dispatch('totalUpdated', $this->serviceId, $this->total);
    }

    public function handleSelectedOptions($type, $key)
    {
        $this->{$type} = $key;
    }

    #[On('osCreated')]
    public function saveOS($id)
    {
        $id_locacao = OsService::updateOrCreate(
            ['id' => $this->id_locacao, 'id_service' => $this->servicesOS],
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
                'employee_cost' => $this->custoMotorista,
                'employee_extra' => $this->horaExtraMotorista,
            ]
        );

        $this->id_locacao = $id_locacao->id;
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        $this->{$type} = $value;
    }

    public function render()
    {
        return view('livewire.service-os-locacao');
    }
}
