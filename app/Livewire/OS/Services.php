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
    public $service = [];
    public $securityType;
    public $bilingue;
    public $armored;
    public $driver;
    public $serviceTemp;
    public $servicoCadastrado;
    public $valoresComplete = false;
    public $servicoComplete = false;

    public function mount($serviceId = null, $type = null, $idGlobal = null)
    {
        $this->serviceId = $serviceId;
        $this->type = $type;
        $this->idGlobal = $idGlobal;
        $this->securityType = $this->securityType;
        $this->bilingue = $this->bilingue;
        $this->armored = $this->armored;
        $this->driver = $this->driver;
        $this->serviceTemp = $this->serviceTemp ?? null;
        $this->servicoCadastrado = $this->servicoCadastrado;
    }

    #[On('valoresCreated')]
    public function handleValoresCreated($id, $data)
    {
        $this->skipRender();
        if ($id == $this->serviceId) {
            $this->service = array_merge($this->service, $data);
            $this->valoresComplete = true;
            $this->checkIfServiceIsComplete();
        }
    }

    #[On('servicoCreated')]
    public function handleServicoCreated($id, $data)
    {
        $this->skipRender();
        if ($id == $this->serviceId) {
            $this->service = array_merge($this->service, $data);
            $this->servicoComplete = true;
            $this->checkIfServiceIsComplete();
        }
    }

    public function checkIfServiceIsComplete()
    {
        if ($this->valoresComplete && $this->servicoComplete) {
            $this->dispatch('OScreated', $this->serviceId, $this->service);
        }
    }

    public function render()
    {
        return view('livewire.o-s.services');
    }
}
