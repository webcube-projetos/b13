<?php

namespace App\Livewire\OS;

use Livewire\Component;
use App\Models\Service;
use App\Models\Vehicle;
use Livewire\Attributes\On;

class Services extends Component
{
    public $serviceId;
    public $type;
    public $idGlobal;

    public function mount($serviceId = null, $type = null, $idGlobal = null)
    {
        $this->serviceId = $serviceId;
        $this->type = $type;
        $this->idGlobal = $idGlobal;
    }


    public function render()
    {
        return view('livewire.o-s.services');
    }
}
