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
    public $typesVehicle = null;

    public function mount($serviceId = null)
    {
        if ($serviceId) {
            $this->serviceId = $serviceId;
            $this->getMotoristas();
        }
    }

    #[On('typesVehicleUpdated')]
    public function updatedtypesVehicle($value, $serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return $this->skipRender();
        }

        $this->typesVehicle = $value;
    }

    public function getMotoristas()
    {
        $services = OsService::find($this->serviceId);
        $this->typesVehicle = $services->service->vehicleType->id ?? '';

        if (!$services) return;

        foreach ($services->motoristas as $motorista) {
            $this->motoristas[] = ['id' => $motorista->id, 'serviceId' => $this->serviceId];
        }
    }

    public function addLinhaVM()
    {
        if (!$this->typesVehicle) {
            return $this->dispatch('alert', ['type' => 'warning', 'message' => 'Selecione o tipo de veículo.']);
        }

        $this->motoristas[] = ['id' => uniqid(), 'serviceId' => $this->serviceId];
    }

    #[On('deleteMotorista')]
    public function removeMotorista($motoristaId)
    {
        $motorista = OsEmployeeVehicle::find($motoristaId);

        if ($motorista) {
            $motorista->executions->each(function ($execution) {
                $execution->expense?->delete();
                $execution->delete();
            });

            $motorista->delete();
        }

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
