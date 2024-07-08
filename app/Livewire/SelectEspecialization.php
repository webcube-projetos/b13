<?php

namespace App\Livewire;

use App\Models\Specialization;
use Livewire\Component;

class SelectEspecialization extends Component
{
    public $especializations = null;
    public $placeholder;
    public $name;
    public $selected = null;
    public $primary;
    public $selectedPrimary = null;

    public function mount($type, $placeholder, $name, $selected)
    {
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->primary = $this->especialization(true);
        $this->dispatch('tomselect-init');
    }
    public function render()
    {
        return view('livewire.select-especialization', [
            'placeholder' => $this->placeholder,
            'selected' => $this->selected,
        ]);
    }

    public function especialization($primary = false, $selectedPrimaryId = null)
    {
        return Specialization::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->when($primary, fn ($query) => $query->whereNull('id_ascendent'))
            ->when(!$primary, fn ($query) => $query->where('id_ascendent', intval($selectedPrimaryId)))
            ->get();
    }
    public function updatedSelectedPrimary($selectedPrimaryId)
    {
        $this->especializations = $this->especialization(false, $selectedPrimaryId);
        $this->dispatch('tomselect-update', options: $this->especializations);
    }
}
