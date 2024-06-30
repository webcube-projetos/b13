<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class ServiceOS extends Component
{
    public $servicesOS = [];
    public $totals = [];
    public $totalGlobal = 0.00;

    public function mount()
    {
        $this->servicesOS = [];
    }

    protected $listeners = [
        'addLinhaServicoLocacao' => 'handleAddLinhaServicoLocacao',
        'addLinhaServicoSeguranca' => 'handleAddLinhaServicoSeguranca',
        'totalUpdated' => 'handleTotalUpdated',
        'clonarLinhaparent' => 'handleClonarLinha',
        'deletarLinhaparent' => 'handleDeletarLinha',
        'saveOS' => 'handleSaveOS',
    ];

    public function handleAddLinhaServicoLocacao()
    {
        $id = uniqid();
        $this->servicesOS[] = ['type' => 'locacao', 'id' => $id];
        $this->totals[$id] = 0;
    }

    public function handleAddLinhaServicoSeguranca()
    {
        $id = uniqid();
        $this->servicesOS[] = ['type' => 'seguranca', 'id' => $id];
        $this->totals[$id] = 0;
    }

    public function handleTotalUpdated($serviceId, $total)
    {
        $this->totals[$serviceId] = $total;
        $this->totalGlobal = array_sum($this->totals);
        $this->dispatch('update-global-total', number_format($this->totalGlobal, 2, ',', '.'));
    }

    public function handleClonarLinha($serviceId, $data)
    {
        foreach ($this->servicesOS as $index => $service) {
            if ($service['id'] === $serviceId) {
                $newService = $service;
                $newService['id'] = uniqid();
                $newService['data'] = $data;

                $this->servicesOS[] = $newService;
                $this->totals[$newService['id']] = $this->totals[$serviceId];
                break;
            }
        }
        $this->totalGlobal = array_sum($this->totals);
        $this->dispatch('update-global-total', $this->totalGlobal);
    }

    public function handleDeletarLinha($serviceId)
    {
        $servicesOS = $this->servicesOS;
        $servicesOS = array_filter($servicesOS, function ($service) use ($serviceId) {
            return $service['id'] !== $serviceId;
        });
        $servicesOS = array_values($servicesOS);

        $this->servicesOS = $servicesOS;

        unset($this->totals[$serviceId]);
        $this->totalGlobal = array_sum($this->totals);
        $this->dispatch('update-global-total', $this->totalGlobal);
    }

    public function render()
    {
        return view('livewire.service-os');
    }
}
