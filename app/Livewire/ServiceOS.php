<?php

namespace App\Livewire;

use App\Models\OS;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class ServiceOS extends Component
{
    public $servicesOS = [];
    public $totals = [];
    public $totalGlobal = 0.00;
    public $id;

    public function mount($id = null)
    {
        $this->servicesOS = [];
        $this->id = $id;

        if ($this->id) {
            $orcamento  = OS::find($this->id);
            $services = $orcamento->services;
            $this->handleCreateLines($services);
        }
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

    public function handleCreateLines($services)
    {
        foreach ($services as $service) {
            $data = [
                'inicio' => $service->start,
                'termino' => $service->finish,
                'qtdDias' => $service->qtd_days,
                'qtdServices' => $service->time,
                'servicesOS' => $service->id_service,
                'vehiclesCategory' => null,
                'typesVehicle' => null,
                'idioma' => null,
                'selectBrand' => null,
                'similar' => null,
                'armored' => null,
                'precoBase' => $service->price,
                'horaBase' => $service->time,
                'horaExtra' => $service->extra_price,
                'kmBase' => $service->km,
                'kmExtra' => $service->km_extra,
                'custoParceiro' => $service->partner_cost,
                'extraParceiro' => $service->extraParceiro,
                'kmExtraParceiro' => $service->partner_extra_cost,
                'custoEmployee' => $service->employee_cost,
                'horaExtraEmployee' => $service->employee_extra,
                'parceiro' => null,
                'total' => $service->price,
            ];

            $newService = ['type' => $service->km > 0 ? 'locacao' : 'seguranca', 'id' => $service->id];
            $newService['data'] = $data;
            $this->servicesOS[] = $newService;
            $this->totals[$newService['id']] = $this->totals[$service->id] ?? 0;

            $this->totals[$service->id] = $service->price;
        }
        $this->totalGlobal = array_sum($this->totals);
        $this->dispatch('update-global-total', number_format($this->totalGlobal, 2, ',', '.'));
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
        $this->servicesOS = array_values(array_filter($this->servicesOS, function ($service) use ($serviceId) {
            return $service['id'] !== $serviceId;
        }));
        $this->servicesOS = collect($this->servicesOS)->values()->all();
        unset($this->totals[$serviceId]);
        $this->totalGlobal = array_sum($this->totals);
        $this->dispatch('update-global-total', $this->totalGlobal);
    }

    public function render()
    {
        return view('livewire.service-os');
    }
}
