<?php

namespace App\Livewire\OS;

use Livewire\Component;

use App\Models\OsEmployeeVehicle;
use App\Models\OsService;
use Livewire\Attributes\On;


class SegurancaList extends Component
{
    public $segurancas = [];
    public $serviceId;
    public $typesVehicle = null;

    public function mount($serviceId = null)
    {
        if ($serviceId) {
            $this->serviceId = $serviceId;
            $this->getSegurancas();
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

    public function getSegurancas()
    {
        $services = OsService::find($this->serviceId);
        $this->typesVehicle = $services->service->vehicleType->id ?? '';

        if (!$services) return;

        foreach ($services->motoristas as $seguranca) {
            $this->segurancas[] = ['id' => $seguranca->id, 'serviceId' => $this->serviceId];
        }
    }

    public function addLinhaVM()
    {

        $this->segurancas[] = ['id' => uniqid(), 'serviceId' => $this->serviceId];
    }

    #[On('deleteSeguranca')]
    public function removeseguranca($segurancaId)
    {
        $seguranca = OsEmployeeVehicle::find($segurancaId);

        if ($seguranca) {
            $seguranca->executions()->delete();
            $seguranca->delete();
        }

        $segurancas = array_values(array_filter($this->segurancas, function ($seguranca) use ($segurancaId) {
            return $seguranca['id'] != $segurancaId;
        }));

        $this->segurancas = $segurancas;
        $this->dispatch('reload-executions');
    }


    public function render()
    {
        return view('livewire.o-s.seguranca-list');
    }
}
