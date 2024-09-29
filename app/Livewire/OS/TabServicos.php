<?php

namespace App\Livewire\OS;

use App\Models\OsService;
use Livewire\Attributes\On;
use Livewire\Component;

class TabServicos extends Component
{
    public $total = null;
    public $servicesOS = [];
    public $totals = [];
    public $totalGlobal = 0.00;
    public $id;

    public function mount($id = null)
    {
        $this->id = $id;
        $servicesOS = OsService::where('id_os', $this->id)->get();

        if ($servicesOS) {
            foreach ($servicesOS as $service) {
                $this->servicesOS[] = ['type' => $service->service->serviceType->name, 'id' => $service->id];
            }
        }
    }

    #[On('OScreated')]
    public function saveOS($id, $service)
    {
        $osService = OsService::find($id);

        if (!$osService) {
            $osService = new OsService();
        }

        $osService->fill($service)->save();
        $osService->os->fill($service)->save();

        $this->dispatch('os-service-created', $osService->id);
    }


    public function addLinhaServicoLocacao()
    {
        $id = uniqid();
        $this->servicesOS[] = ['type' => 'Locação', 'id' => $id];
        $this->totals[$id] = 0;
    }

    #[On('removeLinhaServico')]
    public function removeLinhaServico($serviceId)
    {
        $servicos = array_values(array_filter($this->servicesOS, function ($servico) use ($serviceId) {
            return $servico['id'] != $serviceId;
        }));

        $this->servicesOS = $servicos;
    }

    public function addLinhaServicoSeguranca()
    {
        $id = uniqid();
        $this->servicesOS[] = ['type' => 'Segurança', 'id' => $id];
        $this->totals[$id] = 0;
    }

    public function render()
    {
        return view('livewire.o-s.tab-servicos');
    }
}
