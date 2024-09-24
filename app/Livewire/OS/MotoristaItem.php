<?php

namespace App\Livewire\OS;

use Livewire\Attributes\On;
use Livewire\Component;

class MotoristaItem extends Component
{
    public $motorista;
    public $index;

    public function deleteMotorista($motoristaId)
    {
        $this->dispatch('deleteMotorista', $motoristaId);
    }

    public function render()
    {
        return view('livewire.o-s.motorista-itens');
    }
}
