<?php

namespace App\Livewire\OS;

use App\Models\OsExecution;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class LinhasExecucao extends Component
{
    public $execucao;
    public $date;
    public $vehicles_plate;
    public $employee_driver;
    public $day;
    public $class = LinhasExecucao::class;
    public $identification;
    public $start_time;
    public $end_time;
    public $exceed_time;
    public $km_start;
    public $km_end;
    public $km_total;
    public $km_exceeded;
    public $toll;
    public $parking;
    public $another_expenses;
    public $total; 
    public $service = null;
    public $targetClass = LinhasExecucao::class;

    public function mount($execucao)
    {
        $this->execucao = $execucao;
        $this->service = $execucao->motorista->oSService->service->id_category_service;
        $this->updateExecutions($execucao);
    }

    public function updateExecutions($execucao)
    {
        $this->vehicles_plate = $execucao->motorista->id_vehicle;
        $this->employee_driver = $execucao->motorista->id_employee;
        $this->date = Carbon::parse($execucao->date)->format('Y-m-d');

        $this->start_time = $execucao->start_time;
        $this->identification = $execucao->identification;
        $this->end_time = $execucao->end_time;
        $this->exceed_time = $this->getFormattedExceedTimeProperty($execucao->exceed_time);
        $this->km_start = $execucao->km_start;
        $this->km_end = $execucao->km_end;
        $this->km_total = $execucao->km_total;
        $this->km_exceeded = $execucao->km_exceed;
        $this->toll = $execucao->toll;
        $this->parking = $execucao->parking;
        $this->another_expenses = $execucao->another_expenses;
    }

    public function updated($property)
    {
        $execution = OsExecution::find($this->execucao->id);

        if (!$this->{$property}) return;

        $execution->{$property} = $this->{$property};

        $execution->save();
        $this->updateExecutions($execution);
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value, $target = null)
    {
        if (!in_array($type, ['employee_driver', 'vehicles_plate'])) {
            return $this->skipRender();
        }

        if ($target) {
            $targetParts = explode('-', $target);
            $id = end($targetParts);

            if ($id == $this->execucao->id) {
                $this->{$type} = $value;
            }
        }
    }

    public function getFormattedExceedTimeProperty($exceed_time)
    {
        if (!is_numeric($exceed_time)) {
            return '00:00';
        }

        $hours = floor($exceed_time / 60);
        $minutes = $exceed_time % 60;

        return sprintf('%02d:%02d', $hours, $minutes);
    }

    public function render()
    {
        return view('livewire.o-s.linhas-execucao');
    }
}
