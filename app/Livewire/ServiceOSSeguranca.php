<?php

namespace App\Livewire;

use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceOSSeguranca extends Component
{
    public $serviceId;
    public $inicio;
    public $termino;
    public $qtdDias;
    public $qtdSegurancas;
    public $services = null;
    public $vehiclesCategory;
    public $precoBase = 0;
    public $horaBase = 0;
    public $horaExtra = 0;
    public $kmBase = 0;
    public $kmExtra = 0;
    public $custoParceiro = 0;
    public $extraParceiro = 0;
    public $kmExtraParceiro = 0;
    public $custoSeguranca = 0;
    public $horaExtraSeguranca = 0;
    public $total = 0;

    protected $listeners = [
        'clonarLinha' => 'handleClonarLinha',
        'deletarLinha' => 'handleDeletarLinha',
    ];

    public function mount($serviceId, $data = null)
    {
        $this->serviceId = $serviceId;

        if ($data) {
            $this->inicio = $data['inicio'];
            $this->termino = $data['termino'];
            $this->qtdDias = $data['qtdDias'];
            $this->qtdSegurancas = $data['qtdSegurancas'];
            $this->services = $data['services'];
            $this->vehiclesCategory = $data['vehiclesCategory'];
            $this->precoBase = $data['precoBase'];
            $this->horaBase = $data['horaBase'];
            $this->horaExtra = $data['horaExtra'];
            $this->kmBase = $data['kmBase'];
            $this->kmExtra = $data['kmExtra'];
            $this->custoParceiro = $data['custoParceiro'];
            $this->extraParceiro = $data['extraParceiro'];
            $this->kmExtraParceiro = $data['kmExtraParceiro'];
            $this->custoSeguranca = $data['custoSeguranca'];
            $this->horaExtraSeguranca = $data['horaExtraSeguranca'];
            $this->total = $data['total'];
        }
    }
    public function updated($property)
    {
        $this->total = $this->precoBase + $this->horaBase + $this->horaExtra + $this->kmBase + $this->kmExtra + $this->custoParceiro + $this->extraParceiro + $this->kmExtraParceiro + $this->custoSeguranca + $this->horaExtraSeguranca;

        $this->dispatch('totalUpdated', $this->serviceId, $this->total);
    }
    public function handleClonarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }
        $data = [
            'inicio' => $this->inicio,
            'termino' => $this->termino,
            'qtdDias' => $this->qtdDias,
            'qtdSegurancas' => $this->qtdSegurancas,
            'services' => $this->services,
            'vehiclesCategory' => $this->vehiclesCategory,
            'precoBase' => $this->precoBase,
            'horaBase' => $this->horaBase,
            'horaExtra' => $this->horaExtra,
            'kmBase' => $this->kmBase,
            'kmExtra' => $this->kmExtra,
            'custoParceiro' => $this->custoParceiro,
            'extraParceiro' => $this->extraParceiro,
            'kmExtraParceiro' => $this->kmExtraParceiro,
            'custoSeguranca' => $this->custoSeguranca,
            'horaExtraSeguranca' => $this->horaExtraSeguranca,
            'total' => $this->total,
        ];
        $this->dispatch('clonarLinhaparent', $this->serviceId, $data);
    }

    #[On('osCreated')]
    public function saveOS($id)
    {
        $osService = OsService::create([
            'id_os' => $id,
            'id_service' => $this->services,
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
            'employee_cost' => $this->custoSeguranca,
            'employee_extra' => $this->horaExtraSeguranca,
        ]);
    }

    public function handleDeletarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }

        $this->dispatch('deletarLinhaparent', $this->serviceId);
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        $this->{$type} = $value;
    }

    public function render()
    {
        return view('livewire.service-os-seguranca');
    }
}
