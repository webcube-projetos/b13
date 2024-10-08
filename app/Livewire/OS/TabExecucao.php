<?php

namespace App\Livewire\OS;

use App\Models\OsEmployeeVehicle;
use App\Models\OsExecution;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Collection;

class TabExecucao extends Component
{
    public $id;
    public Collection $execucoes;
    public $dataPesquisa;
    public $employee_driver;
    public $vehicles_plate;
    public $empresas;
    public $targetClass;

    public function mount($id = null)
    {
        $this->id = $id;
        $this->execucoes = collect();
        $this->targetClass = TabExecucao::class;

        $this->loadExecutions();
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value)
    {
        if (in_array($type, ['employee_driver', 'vehicles_plate', 'empresas'])) {
            $this->{$type} = $value;
            $this->loadExecutions();
        }
    }

    public function updatedDataPesquisa($value)
    {
        $this->loadExecutions();
    }

    public function loadExecutions()
    {
        $servicos = OsEmployeeVehicle::where('id_os', $this->id)->get();

        $this->execucoes = OsExecution::whereIn('id_employee_vehicle', $servicos->pluck('id'))
            ->when($this->dataPesquisa, function ($query) {
                $query->whereDate('date', $this->dataPesquisa);
            })
            ->whereHas('motorista', function ($query) {
                $query->when($this->employee_driver, function ($query) {
                    $query->where('id_employee', $this->employee_driver);
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
    public function reloadExecutions()
    {
        $this->loadExecutions();
    }

    public function render()
    {
        return view('livewire.o-s.tab-execucao');
    }
}
