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
        foreach ($services as $serviceOS) {
            $data = [
                'inicio' => $serviceOS->start,
                'termino' => $serviceOS->finish,
                'qtdDias' => $serviceOS->qtd_days,
                'qtdServices' => $serviceOS->qtd_service,
                'servicesOS' => $serviceOS->id_service,
                'modelVehicle' => $serviceOS->modelo_veiculo,
                'vehiclesCategory' => $serviceOS->service->id_category_espec,
                'categoryService' => $serviceOS->service->id_category_service,
                'typesVehicle' => $serviceOS->service->id_vehicle,
                'idioma' => null,
                'selectBrand' => null,
                'armored' => $serviceOS->service->blindado_armado,
                'bilingue' => $serviceOS->service->bilingual,
                'qtdHoras' => $serviceOS->time,
                'precoBase' => $serviceOS->price / 100,
                'horaBase' => $serviceOS->time,
                'horaExtra' => $serviceOS->extra_price / 100,
                'kmBase' => $serviceOS->km,
                'kmExtra' => $serviceOS->km_extra / 100,
                'custoParceiro' => $serviceOS->partner_cost / 100,
                'extraParceiro' => $serviceOS->partner_extra_time / 100,
                'kmExtraParceiro' => $serviceOS->partner_extra_km / 100,
                'custoEmployee' => $serviceOS->employee_cost / 100,
                'horaExtraEmployee' => $serviceOS->employee_extra / 100,
                'parceiro' => null,
                'total' => (($serviceOS->price * $serviceOS->qtd_days) * $serviceOS->qtd_service) / 100,
            ];

            $newService = ['type' => $serviceOS->km > 0 ? 'locacao' : 'seguranca', 'id' => $serviceOS->id];
            $newService['data'] = $data;
            $this->servicesOS[] = $newService;
            $this->totals[$newService['id']] = $this->totals[$serviceOS->id] ?? 0;

            $this->totals[$serviceOS->id] = $serviceOS->total;
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
        $totalOrcamento = $this->totalGlobal;
        $this->dispatch('totalUpdated', $totalOrcamento);
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
