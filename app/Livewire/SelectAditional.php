<?php

namespace App\Livewire;

use App\Models\Additional;
use App\Models\Specialization;
use Livewire\Component;

class SelectAditional extends Component
{
    public $placeholder;
    public $name;
    public $selected = null;
    public $primary;

    public function mount($placeholder, $name, $selected)
    {
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->primary = $this->additional(true);
    }
    public function render()
    {
        return view('livewire.select-aditional', [
            'placeholder' => $this->placeholder,
            'selected' => $this->selected,
        ]);
    }

    public function additional()
    {
        return Additional::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
    }
}
