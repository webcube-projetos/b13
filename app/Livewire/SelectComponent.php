<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\Specialization;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class SelectComponent extends Component
{
    public $options;
    public $placeholder;
    public $name;
    public $selected;
    public $selectedPrimaryId;

    public function mount($type, $placeholder, $name, $selected)
    {
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->options = match ($type) {
            'especialization' => $this->especialization(),
            'especialization_primary' => $this->especialization(true),
            'empresas' => $this->empresas(),
        };
    }
    public function render()
    {
        return view('livewire.select-component', [
            'placeholder' => $this->placeholder
        ]);
    }

    public function especialization($primary = false, $selectedPrimaryId = null)
    {
        return Specialization::select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->when($primary, fn ($query) => $query->whereNull('id_ascendent'))
            ->when(!$primary, fn ($query) => $query->where('id_ascendent', $selectedPrimaryId))
            ->get();
    }

    public function empresas()
    {
        return Company::select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
