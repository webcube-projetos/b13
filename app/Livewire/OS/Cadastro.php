<?php

namespace App\Livewire\OS;

use App\Models\OS;
use App\Models\OsService;
use App\Traits\MontarForm;
use Livewire\Attributes\On;
use Livewire\Component;

class Cadastro extends Component
{
    public $prefix = 'orcamento';
    public $dados;
    public $selectedPrimary;
    public $contato;
    public $paymentMethod;
    public $client;
    public $os = null;
    public $custosEmployees = [];
    public $custosParceiro = [];
    public $custoTotalEmployee = [];
    public $custoTotalParceiro = [];

    public $total = null;
    public $servicesOS = [];
    public $totals = [];
    public $totalGlobal = 0.00;
    public $id;

    use MontarForm;

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
        dump($id, $service);
    }

    public function render()
    {
        return view('livewire.o-s.cadastro');
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
}
