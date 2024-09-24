<?php

namespace App\Livewire\OS;

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

    public $servicoCadastrado = null;


    #[On('preencherCamposDoServico')]
    public function preencherCamposDoServico()
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

    #[On('zerarCamposDoServico')]
    public function zerarCamposDoServico()
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
        return view('livewire.o-s.campo-valores');
    }
}
