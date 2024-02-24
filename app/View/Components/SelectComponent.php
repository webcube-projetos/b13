<?php

namespace App\View\Components;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;

class SelectComponent extends Component
{
    public $name;
    public $componentId;
    public $label;
    public $route;
    public $required;
    public $value;
    public $function;
    public $registros;

    public function __construct($name, $componentId, $label, $route, $required, $function, $value = null)
    {
        $this->name = $name;
        $this->componentId = $componentId;
        $this->label = $label;
        $this->route = $route;
        $this->required = $required;
        $this->function = $function;
        $this->value = $value;
    }

    public function render()
    {

        // Nome da classe do controlador armazenado na variável
        $controllerClassName = "App\Http\Controllers\\$this->route";

        // Instanciar o controlador dinamicamente
        $controllerInstance = App::make($controllerClassName);

        // Chame o método no controlador instanciado
        $this->registros = $controllerInstance->select();

        return view('components.select-component');
        
    }
}
