<?php

namespace App\Livewire;

use App\Models\OS;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormCustos extends Component
{
    public $custoTotalEmployee = 0;
    public $custoTotalParceiro = 0;
    public $custosAdicionais = 0;
    public $totalGeral = 0;
    public $custosEmployees = [];  // Initialize as an empty array
    public $custosParceiro = [];   // Initialize as an empty array
    public $id;

    protected $listeners = ['updateFormCustos'];

    public function mount()
    {
        if ($this->id) {
            $orcamento  = OS::find($this->id);

            $this->custoTotalEmployee = $orcamento->services->sum('employee_cost');
            $this->custoTotalParceiro = $orcamento->services->sum('partner_cost');
        }
    }

    public function updateFormCustos($data)
    {
        // Receive the costs per line
        $this->custosEmployees = $data['custosEmployees'];
        $this->custosParceiro = $data['custosParceiro'];

        // Calculate the totals here
        $this->custoTotalEmployee = array_sum($this->custosEmployees);
        $this->custoTotalParceiro = array_sum($this->custosParceiro);

        $this->calculateTotalGeral();
    }

    public function updatedCustosAdicionais()
    {
        $this->calculateTotalGeral();
    }

    public function calculateTotalGeral()
    {
        $employee = (float) str_replace(['.', ','], ['', '.'], $this->custoTotalEmployee);
        $parceiro = (float) str_replace(['.', ','], ['', '.'], $this->custoTotalParceiro);
        $adicionais = (float) str_replace(['.', ','], ['', '.'], $this->custosAdicionais);
        $this->totalGeral = number_format($employee + $parceiro + $adicionais, 2, ',', '.');
    }
    public function render()
    {
        return view('livewire.form-custos');
    }
}
