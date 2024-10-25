<?php

namespace App\Livewire\OS;

use Livewire\Component;

class Financeiro extends Component
{
    public $id;

    public function mount($id = null)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('livewire.o-s.financeiro');
    }
}
