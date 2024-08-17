<?php

namespace App\Livewire\OS;

use Livewire\Component;

class Services extends Component
{
    public $serviceId;
    public $type;
    public $idGlobal;

    /* CAMPOS DE SERVIÇO */
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
    public $nomeServico;
    public $nomeServicoIngles;
    /* FIM CAMPOS DE SERVIÇO */

    /* CAMPOS DE EXECUÇÃO */

    /* FIM CAMPOS DE EXECUÇÃO */

    /* CAMPOS DE PREÇOS */
    public $precoBase;
    public $horaBase;
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

    public function render()
    {
        return view('livewire.o-s.services');
    }
}
