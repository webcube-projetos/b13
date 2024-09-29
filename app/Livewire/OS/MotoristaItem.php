<?php

namespace App\Livewire\OS;

use App\Models\OsEmployeeVehicle;
use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class MotoristaItem extends Component
{
    public $motorista;
    public $index;

    public $empresas;
    public $languages;
    public $vehicles;
    public $especialization_general;
    public $employee_driver;
    public $start;
    public $end;

    public $serviceId;
    public $motoristaId;

    public function mount($motorista = null)
    {
        if ($motorista) {
            $this->motoristaId = $motorista['id'];
            $this->serviceId = $motorista['serviceId'];

            $motoristaCadastrado = OsEmployeeVehicle::find($motorista['id']);

            if ($motoristaCadastrado) {
                $this->empresas = $motoristaCadastrado->id_company ?? '';
                $this->languages = $motoristaCadastrado->language;
                $this->vehicles = $motoristaCadastrado->id_vehicle;
                $this->especialization_general = $motoristaCadastrado->speciality;
                $this->employee_driver = $motoristaCadastrado->id_employee;
                $this->start = $motoristaCadastrado->start;
                $this->end = $motoristaCadastrado->end;
            }
        }
    }

    public function deleteMotorista($motoristaId)
    {
        $this->dispatch('deleteMotorista', $motoristaId);
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value, $target = null)
    {
        if (!in_array($type, ['empresas', 'languages', 'vehicles', 'especialization_general', 'employee_driver'])) {
            return $this->skipRender();
        }

        if ($target) {
            $targetParts = explode('-', $target);
            $motoristaId = end($targetParts);

            if ($motoristaId == $this->motoristaId) {
                $this->{$type} = $value;
            }
        }
    }

    #[On('os-service-created')]
    public function handleOsServiceCreated($id)
    {
        if ($id == $this->serviceId) {
            $motoristas = OsEmployeeVehicle::find($this->motoristaId);
            $os = OsService::find($this->serviceId)->os->id;

            if (!$motoristas) {
                $motoristas = new OsEmployeeVehicle();
            }

            // dump($this->start, $this->end, $this->empresas, $this->languages, $this->vehicles, $this->especialization_general, $this->employee_driver);

            $motoristas->fill(
                [
                    'start' => $this->start,
                    'end' => $this->end,
                    'id_company' => $this->empresas,
                    'language' => $this->languages,
                    'vehicles' => $this->vehicles,
                    'speciality' => $this->especialization_general,
                    'id_employee' => $this->employee_driver,
                    'id_service_os' => $this->serviceId,
                    'id_os' => $os
                ]
            )->save();
        }
    }


    public function render()
    {
        return view('livewire.o-s.motorista-itens');
    }
}
