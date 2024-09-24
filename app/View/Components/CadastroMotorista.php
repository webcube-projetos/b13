<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CadastroMotorista extends Component
{
    public $motorista;
    public $index;

    public function __construct($motorista, $index)
    {
        $this->motorista = $motorista;
        $this->index = $index;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cadastro-motorista');
    }
}
