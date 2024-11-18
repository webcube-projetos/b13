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
    public $paymentOptions;
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
    public $obs;

    public $targetClass = Cadastro::class;

    use MontarForm;

    public function mount($id = null)
    {
        $this->id = $id;

        if ($this->id) {
            $orcamento = OS::find($this->id);

            $this->contato = $orcamento->id_contact;
            $this->paymentMethod = $orcamento->id_payment_method;
            $this->paymentOptions = $orcamento->id_payment_options;
            $this->obs = $orcamento->obs;
            $this->client = $orcamento->id_client;
            $this->total = $orcamento->executions->sum('total');
        }
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (!in_array($type, ['contato', 'client'])) {
            return;
        }

        $this->{$type} = $value;
    }

    #[On('saveOS')]
    public function editOS()
    {
        dd($this->paymentMethod);
        $os = OS::updateOrCreate(
            ['id' => $this->id],
            [
                'id_contact' => $this->contato,
                'id_client' => $this->client,
                'id_payment_method' => $this->paymentMethod,
                'id_payment_options' => $this->paymentOptions,
                'status' => 1,
            ]
        );
        
        $this->os = $os;
        //dipsatch to TabServicos.php
        $this->dispatch('osInfo', $os->id);
    }

    public function render()
    {
        return view('livewire.o-s.cadastro');
    }
}
