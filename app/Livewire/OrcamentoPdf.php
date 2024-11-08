<?php

namespace App\Livewire;

use App\Models\OS;
use Livewire\Component;

class OrcamentoPdf extends Component
{
    public $os;

    public function mount($osId)
    {
        $this->os = OS::with([
            'contact', 
            'client', 
            'paymentMethod',
            'paymentOption'.
            'services.service' => function ($query) { // Eager loading aninhado
                $query->with('serviceType', 'categoryService', 'categoryEspec', 'vehicleType');
            }
        ])->find($osId);
    }

    public function getFormattedCreatedAtProperty()
    {
        return $this->os->created_at->format('d/m/Y');
    }

    public function render() // Certifique-se de que o método é público
    {
        return view('livewire.orcamento-pdf', [
            'os' => $this->os,
            'formattedCreatedAt' => $this->formattedCreatedAt,
        ]);
    }
}
