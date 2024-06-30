<?php

namespace App\Livewire;

use App\Models\OS;
use App\Traits\MontarForm;
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

    use MontarForm;

    protected $listeners = [
        'saveOS' => 'handleSaveOS',
    ];

    public function mount($dados)
    {
        $this->dados = $dados;
    }
    public function render()
    {
        return view('livewire.orcamento-cadastro');
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (!in_array($type, ['contato', 'paymentMethod', 'client'])) {
            return;
        }

        $this->{$type} = $value;
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
}
