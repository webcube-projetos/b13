<?php

namespace App\Livewire\OS;

use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class CampoValores extends Component
{
    public $precoBase;
    public $horaExtra;
    public $kmBase;
    public $kmExtra;
    public $custoParceiro;
    public $extraParceiro;
    public $kmExtraParceiro;
    public $custoEmployee;
    public $horaExtraEmployee;
    public $osService;
    public $serviceId;
    public $servicoCadastrado = null;

    public function mount($serviceId = null)
    {
        if ($serviceId) {
            $this->osService = OsService::find($serviceId);

            $this->precoBase = $this->osService?->price;
            $this->horaExtra = $this->osService?->extra_price;
            $this->kmBase = $this->osService?->km;
            $this->kmExtra = $this->osService?->km_extra;
            $this->custoParceiro = $this->osService?->partner_cost;
            $this->extraParceiro = $this->osService?->partner_extra_time;
            $this->kmExtraParceiro = $this->osService?->partner_extra_km;
            $this->custoEmployee = $this->osService?->employee_cost;
            $this->horaExtraEmployee = $this->osService?->employee_extra;

            $this->serviceId = $serviceId;
        }
    }

    #[On('saveOS')]
    public function saveOS()
    {
        $data = [
            'price' => $this->precoBase,
            'extra_price' => $this->horaExtra,
            'km' => $this->kmBase,
            'km_extra' => $this->kmExtra,
            'partner_cost' => $this->custoParceiro,
            'partner_extra_time' => $this->extraParceiro,
            'partner_extra_km' => $this->kmExtraParceiro,
            'employee_cost' => $this->custoEmployee,
            'employee_extra' => $this->horaExtraEmployee,
        ];

        $this->dispatch('valoresCreated', $this->serviceId, $data);
    }


    #[On('preencherCamposDoServico')]
    public function preencherCamposDoServico($serviceTemp, $serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }

        dump($serviceTemp);

        $this->servicoCadastrado = 1;

        $this->precoBase = data_get($serviceTemp, 'price');
        $this->horaExtra = data_get($serviceTemp, 'extra_price');
        $this->kmBase = data_get($serviceTemp, 'km');
        $this->kmExtra = data_get($serviceTemp, 'km_extra');
        $this->custoParceiro = data_get($serviceTemp, 'partner_cost');
        $this->extraParceiro = data_get($serviceTemp, 'partner_extra_time');
        $this->kmExtraParceiro = data_get($serviceTemp, 'partner_extra_km');
        $this->custoEmployee = data_get($serviceTemp, 'employee_cost');
        $this->horaExtraEmployee = data_get($serviceTemp, 'employee_extra');
    }

    #[On('zerarCamposDoServico')]
    public function zerarCamposDoServico()
    {
        dump('zerar');
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
        return view('livewire.o-s.campo-valores');
    }
}
