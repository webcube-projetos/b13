<?php

namespace App\Livewire\OS;

use App\Models\OsEmployeeVehicle;
use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class MotoristaList extends Component
{
    public $motoristas = [];
    public $serviceId;

    public function mount($serviceId = null)
    {
        if ($serviceId) {
            $this->serviceId = $serviceId;
            $this->getMotoristas();
        }
    }

    public function getMotoristas()
    {
        $services = OsService::find($this->serviceId);

        foreach ($services->motoristas as $motorista) {
            $this->motoristas[] = ['id' => $motorista->id, 'serviceId' => $this->serviceId];
        }
    }

    public function addLinhaVM()
    {
        $this->motoristas[] = ['id' => uniqid(), 'serviceId' => $this->serviceId];
    }

    #[On('deleteMotorista')]
    public function removeMotorista($motoristaId)
    {
        $motorista = OsEmployeeVehicle::find($motoristaId);

        if (!$motorista) {
            return;
        }

        $motorista->executions()->delete();
        $motorista->delete();

        $motoristas = array_values(array_filter($this->motoristas, function ($motorista) use ($motoristaId) {
            return $motorista['id'] != $motoristaId;
        }));

        $this->motoristas = $motoristas;
        $this->dispatch('reload-executions');
    }

    public function render()
    {
        return view('livewire.o-s.motorista-list');
    }
}
