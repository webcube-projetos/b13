<?php

namespace App\Livewire\OS;

use Livewire\Attributes\On;
use Livewire\Component;

class MotoristaList extends Component
{
    public $motoristas = [];

    public function addLinhaVM()
    {
        $this->motoristas[] = ['id' => uniqid(), 'motorista' => []];
    }

    #[On('deleteMotorista')]
    public function removeMotorista($motoristaId)
    {
        $motoristas = array_values(array_filter($this->motoristas, function ($motorista) use ($motoristaId) {
            return $motorista['id'] != $motoristaId;
        }));

        $this->motoristas = $motoristas;
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value, $target = null)
    {
        if (!in_array($type, ['empresas', 'languages', 'vehicles', 'employeeSpeciality', 'employee_driver'])) {
            return $this->skipRender();
        }

        if ($target) {
            $targetParts = explode('-', $target);
            $motoristaId = end($targetParts);

            foreach ($this->motoristas as $index => $motorista) {
                if ($motorista['id'] == $motoristaId) {
                    $this->motoristas[$index]['motorista'][$type] = $value;
                    break;
                }
            }
        }
    }


    public function render()
    {
        return view('livewire.o-s.motorista-list');
    }
}
