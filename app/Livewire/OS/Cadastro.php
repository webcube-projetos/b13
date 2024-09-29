<?php

namespace App\Livewire\OS;

use App\Models\OS;
use App\Models\OsService;
use App\Traits\MontarForm;
use Livewire\Attributes\On;
use Livewire\Component;

class Cadastro extends Component
{
    public $prefix = 'orcamento';
    public $dados;
    public $selectedPrimary;
    public $contato;
    public $paymentMethod;
    public $client;
    public $os = null;
    public $custosEmployees = [];
    public $custosParceiro = [];
    public $custoTotalEmployee = [];
    public $custoTotalParceiro = [];

    public $total = null;
    public $servicesOS = [];
    public $totals = [];
    public $totalGlobal = 0.00;
    public $id;

    use MontarForm;

    public function render()
    {
        return view('livewire.o-s.cadastro');
    }
}
