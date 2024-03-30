<?php

namespace App\Livewire;

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

    public function mount($type, $placeholder, $name, $selected)
    {
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->options = match ($type) {
            'especialization' => $this->especialization($placeholder),
        };
    }
    public function render()
    {
        return view('livewire.select-component', [
            'placeholder' => $this->placeholder
        ]);
    }

    public function especialization()
    {
        return Specialization::select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->whereNull('id_ascendent')
            ->get();
    }
}
