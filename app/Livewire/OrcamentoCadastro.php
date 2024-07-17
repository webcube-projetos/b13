<?php

namespace App\Livewire;

use App\Models\OS;
use App\Traits\MontarForm;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class OrcamentoCadastro extends Component
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

    use MontarForm;

    protected $listeners = [
        'saveOS' => 'handleSaveOS',
        'custosUpdated' => 'handleCustosUpdated',
    ];

    public function mount($dados)
    {
        $this->dados = $dados;
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (!in_array($type, ['contato', 'paymentMethod', 'client'])) {
            return;
        }

        $this->{$type} = $value;
    }

    public function handleCustosUpdated($serviceId, $data)
    {
        // Calculate costs for this specific line
        $custoEmployeesLinha = $data['parceiro'] ? 0 : $data['custoEmployee'] * $data['qtdDias'] * $data['qtdServices'];
        $custoParceiroLinha = $data['parceiro'] ? $data['custoParceiro'] * $data['qtdDias'] * $data['qtdServices'] : 0;

        // Store the costs per line in the arrays
        $this->custosEmployees[$serviceId] = $custoEmployeesLinha;
        $this->custosParceiro[$serviceId] = $custoParceiroLinha;

        // Dispatch event with the updated costs per line (no need to calculate totals here)
        $this->dispatch('updateFormCustos', [
            'custosEmployees' => $this->custosEmployees,
            'custosParceiro' => $this->custosParceiro,
        ]);

        $this->dispatch('refreshComponent'); 
    }

    public function handleSaveOS()
    {
        $os = OS::create([
            'id_contact' => $this->contato,
            'id_client' => $this->client,
            'id_payment_method' => $this->paymentMethod,
            'status' => 0,
        ]);

        $this->os = $os;
        $this->dispatch('osCreated', $os->id);
    }

    public function render()
    {
        return view('livewire.orcamento-cadastro');
    }
}
