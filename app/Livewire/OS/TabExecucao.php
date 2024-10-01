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
    public $dataPesquisa;
    public $employee_driver;
    public $vehicles_plate;
    public $empresas;
    public $targetClass;

    public function mount($id = null)
    {
        $this->id = $id;
        $this->targetClass = TabExecucao::class;

        $this->getExecutions();
    }

    public function getExecutions()
    {
        $this->execucoes = [];
        $servicos = OsEmployeeVehicle::where('id_os', $this->id)->get();

        $this->execucoes = OsExecution::whereIn('id_employee_vehicle', $servicos->pluck('id'))
            ->when($this->dataPesquisa, function ($query) {
                $query->whereDate('date', $this->dataPesquisa);
            })
            ->whereHas('motorista', function ($query) {
                $query->when($this->employee_driver, function ($query) {
                    $query->where('id_employee_driver', $this->employee_driver);
                })
                    ->when($this->vehicles_plate, function ($query) {
                        $query->where('id_vehicle', $this->vehicles_plate);
                    })
                    ->when($this->empresas, function ($query) {
                        $query->where('id_company', $this->empresas);
                    });
            })
            ->orderBy('date', 'asc')
            ->get();
    }

    #[On('reload-executions')]
    public function saveOS()
    {
        $this->getExecutions();
        $this->render();
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (in_array($type, ['employee_driver', 'vehicles_plate', 'empresas'])) {
            $this->{$type} = $value;
        }
    }


    public function render()
    {
        $this->getExecutions();
        return view('livewire.o-s.tab-execucao');
    }
}
