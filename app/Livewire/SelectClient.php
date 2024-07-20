<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Contact;
use Livewire\Component;

class SelectClient extends Component
{
    public $placeholder;
    public $name;
    public $selected = null;
    public $clients;
    public $contacts = null;
    public $selectedPrimary = null;
    public $contato = null;
    public $cliente;

    public function mount($name, $contato, $cliente)
    {
        $this->name = $name;
        $this->clients = $this->clients();

        $this->contato = $contato;
        $this->selectedPrimary = $cliente;
    }
    public function render()
    {
        return view('livewire.select-client', [
            'placeholder' => $this->placeholder,
            'clients' => $this->clients(),
            'contacts' => $this->contacts($this->selectedPrimary)
        ]);
    }

    public function clients()
    {
        return Client::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
    }
    public function contacts($selectedPrimary)
    {
        $this->contacts = Contact::query()
            ->whereHas('client', fn ($query) => $query->where('clients.id', $selectedPrimary))
            ->get();
    }

    public function updatedSelectedPrimary($value)
    {
        $this->dispatch('selectUpdated', 'client', $value);
    }

    public function updatedContato($value)
    {
        $this->dispatch('selectUpdated', 'contato', $value);
    }
}
