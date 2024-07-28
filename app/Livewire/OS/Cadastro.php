<?php

namespace App\Livewire\OS;

use App\Traits\MontarForm;
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
    public $id;
    public $total = null;

    use MontarForm;

    public function render()
    {
        return view('livewire.o-s.cadastro');
    }
}
