<?php

namespace App\Livewire;
  
use Livewire\Component;

class FormFinanceiro extends Component
{
    public $paymentMethod = '';
    public $valorTotal = '0,00';
    public $entradas = [];  // Array to store entrada data
    public $saidas = [];    // Array to store saida data
    public $initialDate;
    public $finalDate;
    
    protected $listeners = ['paymentMethodUpdated', 'update-global-total'];

    // ... other methods ...

    public function paymentMethodUpdated($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
        $this->generateInitialLines(); // Generate lines based on the payment method
    }

    public function updateGlobalTotal($total)
    {
        $this->valorTotal = $total;
        $this->generateInitialLines(); // Generate lines based on the payment method
    }

    public function generateInitialLines()
    {
        if ($this->paymentMethod == 'Entrada 50% + 50%') {
            // Remove any existing entradas
            $this->entradas = [];

            // Calculate each entrada
            $valorEntrada = (float) str_replace(',', '.', str_replace('.', '', $this->valorTotal)) / 2;

            // Add two entrada lines
            for ($i = 0; $i < 2; $i++) {
                $this->entradas[] = [
                    'data_prevista' => '',
                    'valor' => number_format($valorEntrada, 2, ',', '.'),
                ];
            }
        } 
    }

    public function addEntrada()
    {
        $this->entradas[] = ['data_prevista' => '', 'valor' => '0,00'];
    }

    public function removeEntrada($index)
    {
        unset($this->entradas[$index]);
        $this->entradas = array_values($this->entradas); // Reindex the array
    }

    // ... (similar methods for saida)

    public function render()
    {
        return view('livewire.form-financeiro');
    }
}
