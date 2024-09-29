<?php

namespace App\Livewire\OS;

use App\Models\OsEmployeeVehicle;
use App\Models\OsExecution;
use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class TabExecucao extends Component
{
    public $id;
    public $execucoes;

    public function mount($id = null)
    {
        $this->id = $id;

        $this->getExecutions();
    }

    public function getExecutions()
    {
        $servicos = OsEmployeeVehicle::where('id_os', $this->id)->get();

        $this->execucoes = OsExecution::whereIn('id_employee_vehicle', $servicos->pluck('id'))
            ->orderBy('date', 'asc')
            ->get();
    }

    #[On('reload-executions')]
    public function saveOS()
    {

        $this->getExecutions();
    }


    public function render()
    {
        return view('livewire.o-s.tab-execucao');
    }
}
