<?php

namespace App\Livewire;

use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceOsSeguranca extends Component
{
    public $serviceId;
    public $type;
    public $idGlobal;
    public $inicio;
    public $termino;
    public $qtdDias = 0;
    public $qtdSegurancas;
    public $servicesOS = null;
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

    public function mount($serviceId, $type, $data = null)
    {
        $this->serviceId = $serviceId;
        $this->type = $type;

        if ($data) {
            $this->inicio = $data['inicio'];
            $this->termino = $data['termino'];
            $this->qtdDias = $data['qtdDias'];
            $this->qtdSegurancas = $data['qtdSegurancas'];
            $this->servicesOS = $data['servicesOS'];
            $this->vehiclesCategory = $data['vehiclesCategory'];
            $this->precoBase = $data['precoBase'] / 100;
            $this->horaBase = $data['horaBase'];
            $this->horaExtra = $data['horaExtra'] / 100;
            $this->kmBase = $data['kmBase'];
            $this->kmExtra = $data['kmExtra'] / 100;
            $this->custoParceiro = $data['custoParceiro'] / 100;
            $this->extraParceiro = $data['extraParceiro'] / 100;
            $this->kmExtraParceiro = $data['kmExtraParceiro'] / 100;
            $this->custoSeguranca = $data['custoSeguranca'] / 100;
            $this->horaExtraSeguranca = $data['horaExtraSeguranca'] / 100;
            $this->total = $data['total'] / 100;
        }
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
            'servicesOS' => $this->servicesOS,
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
            ['id' => $this->idGlobal, 'id_service' => $this->servicesOS],
            [
                'id_os' => $id,
                'id_service' => $this->servicesOS,
                'qtd_days' => $this->qtdDias,
                'start' => $this->inicio,
                'finish' => $this->termino,
                'price' => $this->total * 100,
                'time' => $this->horaBase,
                'extra_time' => $this->horaExtra * 100,
                'km' => $this->kmBase,
                'km_extra' => $this->kmExtra * 100,
                'partner_cost' => $this->custoParceiro * 100,
                'partner_extra_time' => $this->extraParceiro * 100,
                'partner_extra_km' => $this->kmExtraParceiro * 100,
                'employee_cost' => $this->custoSeguranca * 100,
                'employee_extra' => $this->horaExtraSeguranca * 100,
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
        $qtdSegurancas = (float) str_replace(',', '.', str_replace('.', '', $this->qtdSegurancas));
        $this->total = ($precoBase * $qtdDias) * $qtdSegurancas;

        $this->dispatch('totalUpdated', $this->serviceId, $this->total);
    }

    public function render()
    {
        return view('livewire.service-os-seguranca');
    }
}
