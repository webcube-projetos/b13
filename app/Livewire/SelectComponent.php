<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SelectComponent extends Component
{
    public $name; //string
    public $componentId; //string
    public $label; //string
    public $route; //string
    public $required; //string
    public $value; //string
    public $function; // array
    public $registros;

    public function mount($name, $componentId, $label, $route, $required, $function, $value = null)
    {
        $this->name = $name;
        $this->componentId = $componentId;
        $this->label = $label;
        $this->function = $function;
        $this->required = $required;
        $this->route = $route; 
        $this->value = $value; 

        $response = Http::get(route($this->route));
        $this->registros = $response->json();
    }
    public function render()
    {
        return view('livewire.select-component');
    }
}
