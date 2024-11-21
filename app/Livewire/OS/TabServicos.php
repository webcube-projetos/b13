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

    public $serviceInfo;
    public $serviceId;

    //control to create services
    public $osControl = false;
    public $serviceControl = false;

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

    //Receive to Cadastro.php
    #[On('osInfo')]
    public function handleOsInfo($idOs)
    {
        $this->skipRender();

        if($idOs > 0) {
            $this->id = [
                'id_os' => $idOs,
            ];;
            $this->osControl = true;
            $this->saveOS();
        }
    }

    #[On('osService')]
    public function handleOsService($id, $service) 
    {
        $this->serviceId = $id;
        $this->serviceInfo = $service;
        $this->serviceControl = true;
        $this->saveOS();
    }

    //#[On('OScreated')]
    public function saveOS()
    {
        if ($this->osControl && $this->serviceControl) {
            $osService = OsService::find($this->serviceId);

            if (!$osService) {
                $osService = new OsService();
            }
            
            $this->serviceInfo = array_merge($this->serviceInfo, $this->id);

            $osService->fill($this->serviceInfo)->save();
            $osService->os->fill($this->serviceInfo)->save();

            //dispatch to MotoristaItem.php
            $this->dispatch('os-service-created', $osService->id);
            $this->dispatch('reload-executions');
        }
    }

    public function addLinhaServicoLocacao()
    {
        $id = uniqid();
        $this->servicesOS[] = ['type' => 'Locação', 'id' => $id];
        $this->totals[$id] = 0;
    }

    public function addLinhaServicoSeguranca()
    {
        $id = uniqid();
        $this->servicesOS[] = ['type' => 'Segurança', 'id' => $id];
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

    public function render()
    {
        return view('livewire.o-s.tab-servicos');
    }
}
