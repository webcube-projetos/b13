<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchInput extends Component
{
	public $placeholder;
	public $route;
	public $label;
	public $name;

	public function __construct($config)
	{
		$this->placeholder = $config->placeholder;
		$this->route = $config->route;
		$this->label = $config->label;
		$this->name = $config->name;
	}

	public function render()
	{
		return view('components.search-input');
	}
}
