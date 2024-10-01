<?php

namespace App\Livewire\OS;

use Carbon\Carbon;
use Livewire\Component;

class LinhasExecucao extends Component
{
    public $execucao;
    public $date;

    public function mount($execucao)
    {
        $this->execucao = $execucao;
        $this->date = Carbon::parse($execucao->date)->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.o-s.linhas-execucao');
    }
}
