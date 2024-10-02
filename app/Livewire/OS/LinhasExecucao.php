<?php

namespace App\Livewire\OS;

use Carbon\Carbon;
use Livewire\Component;

class LinhasExecucao extends Component
{
    public $execucao;
    public $date;
    public $vehicles_plate;
    public $employee_driver;
    public $day;
    public $class = LinhasExecucao::class;

    public function mount($execucao)
    {
        $this->execucao = $execucao;
        $this->vehicles_plate = $execucao->motorista->id_vehicle;
        $this->employee_driver = $execucao->motorista->id_employee;
        $this->date = Carbon::parse($execucao->date)->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.o-s.linhas-execucao');
    }
}
