<?php

namespace App\Livewire;

use App\Models\Service;
use App\Models\OsService;
use App\Traits\FinancialTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class ServiceOsItem extends Component
{
    use FinancialTrait;

    //Gerencia se o serviço existe ou não
    public $servicoCadastrado = null;

    //Recebe as informações do serviço existente
    public $serviceTemp = null;

    public $serviceId;
    public $type;
    public $idGlobal;
    public $parceiro = false;
    public $inicio;
    public $termino;
    public $qtdDias;
    public $qtdServices;
    public $bilingue;
    public $armed;
    public $driver;
    public $categoryService;
    public $securityType;
    public $qtdHoras;
    public $typesVehicle;
    public $tipodesconto;
    public $desconto;
    public $vehiclesCategory;
    public $armored;
    public $modelVehicle;
    public $passageiros;
    public $bags;
    public $nomeServico;
    public $nomeServicoIngles;
    public $precoBase;
    public $horaBase;
    public $horaExtra;
    public $kmBase;
    public $kmExtra;
    public $custoParceiro;
    public $extraParceiro;
    public $kmExtraParceiro;
    public $custoEmployee;
    public $horaExtraEmployee;
    public $total;
    public $data = [];
    public $targetClass = ServiceOsItem::class;

    protected $listeners = [
        'clonarLinha' => 'handleClonarLinha',
        'deletarLinha' => 'handleDeletarLinha',
        'selectUpdated' => 'handleSelectedOptions',
        'servicesOS' => 'handleServicesOS'
    ];

    public function mount($serviceId, $type, $data = null)
    {
        $this->serviceId = $serviceId;
        $this->data = $data;
        $this->type = $type;
        if ($this->data) {
            $this->parceiro = $data['parceiro'];
            $this->inicio = $data['inicio'];
            $this->termino = $data['termino'];
            $this->qtdDias = $data['qtdDias'];
            $this->qtdServices = $data['qtdServices'];
            $this->bilingue = $data['bilingue'];
            $this->armed = $data['armed'] ?? false;
            $this->driver = $data['driver'] ?? false;
            $this->categoryService = $data['categoryService'] ?? null;
            $this->securityType = $data['securityType'] ?? null;
            $this->qtdHoras = $data['qtdHoras'];
            $this->typesVehicle = $data['typesVehicle'];
            $this->vehiclesCategory = $data['vehiclesCategory'];
            $this->armored = $data['armored'];
            $this->modelVehicle = $data['modelVehicle'];
            $this->passageiros = $data['passageiros'] ?? null;
            $this->bags = $data['bags'] ?? null;
            $this->nomeServico = $data['nomeServico'] ?? null;
            $this->nomeServicoIngles = $data['nomeServicoIngles'] ?? null;
            $this->precoBase = $data['precoBase'];
            $this->horaBase = $data['horaBase'];
            $this->horaExtra = $data['horaExtra'];
            $this->kmBase = $data['kmBase'];
            $this->kmExtra = $data['kmExtra'];
            $this->custoParceiro = $data['custoParceiro'];
            $this->extraParceiro = $data['extraParceiro'];
            $this->kmExtraParceiro = $data['kmExtraParceiro'];
            $this->custoEmployee = $data['custoEmployee'];
            $this->horaExtraEmployee = $data['horaExtraEmployee'];
            $this->tipodesconto = $data['tipodesconto'] ?? null;
            $this->desconto = $data['desconto'] ?? null;
            $this->passageiros = $data['passageiros'] ?? null;
            $this->bags = $data['bags'] ?? null;
            $this->total = $data['total'];
        }
    }

    public function handleClonarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }
        $this->data = [
            'parceiro' => $this->parceiro,
            'inicio' => $this->inicio,
            'termino' => $this->termino,
            'qtdDias' => $this->qtdDias,
            'qtdServices' => $this->qtdServices,
            'bilingue' => $this->bilingue,
            'armored' => $this->armored,
            'driver' => $this->driver,
            'categoryService' => $this->categoryService,
            'securityType' => $this->securityType,
            'qtdHoras' => $this->qtdHoras,
            'typesVehicle' => $this->typesVehicle,
            'vehiclesCategory' => $this->vehiclesCategory,
            'modelVehicle' => $this->modelVehicle,
            'passageiros' => $this->passageiros,
            'bags' => $this->bags,
            'nomeServico' => $this->nomeServico,
            'nomeServicoIngles' => $this->nomeServicoIngles,
            'precoBase' => $this->precoBase,
            'horaBase' => $this->horaBase,
            'horaExtra' => $this->horaExtra,
            'kmBase' => $this->kmBase,
            'kmExtra' => $this->kmExtra,
            'custoParceiro' => $this->custoParceiro,
            'extraParceiro' => $this->extraParceiro,
            'kmExtraParceiro' => $this->kmExtraParceiro,
            'custoEmployee' => $this->custoEmployee,
            'horaExtraEmployee' => $this->horaExtraEmployee,
            'parceiro' => $this->parceiro,
            'tipodesconto' => $this->tipodesconto,
            'desconto' => $this->desconto,
            'total' => $this->total,
        ];

        $this->dispatch('clonarLinhaparent', $this->serviceId, $this->data);
    }

    public function handleDeletarLinha($serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return;
        }
        $this->dispatch('deletarLinhaparent', $this->serviceId);
    }

    #[On('osCreated')]
    public function saveOS($id)
    {
        try {
            DB::beginTransaction();
            if ($this->serviceTemp) {
                $idGlobal = OsService::updateOrCreate(
                    ['id' => $this->idGlobal, 'id_service' => $this->serviceTemp->id],
                    [
                        'id_os' => $id,
                        'id_service' => $this->serviceTemp->id,
                        'qtd_days' => $this->qtdDias,
                        'qtd_service' => $this->qtdServices,
                        'modelo_veiculo' => $this->modelVehicle,
                        'passengers' => $this->passageiros,
                        'bags' => $this->bags,
                        'start' => $this->inicio,
                        'finish' => $this->termino,
                        'time' => $this->qtdHoras,
                        'km' => $this->kmBase,
                        'price' => $this->convertPrice($this->precoBase),
                        'extra_price' => $this->convertPrice($this->horaExtra),
                        'km_extra' => $this->convertPrice($this->kmExtra),
                        'partner_cost' => $this->convertPrice($this->custoParceiro),
                        'partner_extra_time' => $this->convertPrice($this->extraParceiro),
                        'partner_extra_km' => $this->convertPrice($this->kmExtraParceiro),
                        'employee_cost' => $this->convertPrice($this->custoEmployee),
                        'employee_extra' => $this->convertPrice($this->horaExtraEmployee),
                    ]
                );
            } else {
                $service = Service::create([
                    'name' => $this->nomeServico,
                    'name_english' => $this->nomeServicoIngles,
                    'blindado_armado' => $this->type === 'locacao' ? $this->armored : $this->armed,
                    'bilingual' => $this->bilingue,
                    'driver' => $this->driver ?? 0,
                    'time' => $this->qtdHoras,
                    'km' => $this->kmBase,
                    'price' => $this->convertPrice($this->precoBase),
                    'extra_price' => $this->convertPrice($this->horaExtra),
                    'km_extra' => $this->convertPrice($this->kmExtra),
                    'partner_cost' => $this->convertPrice($this->custoParceiro),
                    'partner_extra_time' => $this->convertPrice($this->extraParceiro),
                    'partner_extra_km' => $this->convertPrice($this->kmExtraParceiro),
                    'employee_cost' => $this->convertPrice($this->custoEmployee),
                    'employee_extra' => $this->convertPrice($this->horaExtraEmployee),
                    'id_category_service' => $this->categoryService,
                    'id_category_espec' => $this->type === 'locacao' ? $this->vehiclesCategory : $this->securityType,
                    'id_service_type' => $this->type === 'locacao' ? 1 : 2,
                    'id_vehicle' => $this->type === 'locacao' ? $this->typesVehicle : null,
                ]);

                $idGlobal = OsService::updateOrCreate(
                    ['id' => $this->idGlobal],
                    [
                        'id_os' => $id,
                        'id_service' => $service->id,
                        'qtd_days' => $this->qtdDias,
                        'qtd_service' => $this->qtdServices,
                        'modelo_veiculo' => $this->modelVehicle ?? null,
                        'passengers' => $this->passageiros,
                        'bags' => $this->bags,
                        'start' => $this->inicio,
                        'finish' => $this->termino,
                        'time' => $this->qtdHoras,
                        'km' => $this->kmBase,
                        'price' => $this->convertPrice($this->precoBase),
                        'extra_price' => $this->convertPrice($this->horaExtra),
                        'km_extra' => $this->convertPrice($this->kmExtra),
                        'partner_cost' => $this->convertPrice($this->custoParceiro),
                        'partner_extra_time' => $this->convertPrice($this->extraParceiro),
                        'partner_extra_km' => $this->convertPrice($this->kmExtraParceiro),
                        'employee_cost' => $this->convertPrice($this->custoEmployee),
                        'employee_extra' => $this->convertPrice($this->horaExtraEmployee),
                    ]
                );
            }
            DB::commit();

            $this->idGlobal = $idGlobal->id;
            return redirect()->to(route('orcamentos.editar', ['id' => $id]));
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    #[On('osUpdated')]
    public function handleOsUpdated($id)
    {
        try {
            DB::beginTransaction();

            $idGlobal = OsService::updateOrCreate(
                ['id' => $this->serviceId, 'id_os' => $id],
                [
                    'id_service' => $this->data['servicesOS'],
                    'qtd_days' => $this->qtdDias,
                    'qtd_service' => $this->qtdServices,
                    'modelo_veiculo' => $this->modelVehicle,
                    'passengers' => $this->passageiros,
                    'bags' => $this->bags,
                    'start' => $this->inicio,
                    'finish' => $this->termino,
                    'time' => $this->horaBase,
                    'km' => $this->kmBase,
                    'price' => $this->convertPrice($this->precoBase),
                    'extra_price' => $this->convertPrice($this->horaExtra),
                    'km_extra' => $this->convertPrice($this->kmExtra),
                    'partner_cost' => $this->convertPrice($this->custoParceiro),
                    'partner_extra_time' => $this->convertPrice($this->extraParceiro),
                    'partner_extra_km' => $this->convertPrice($this->kmExtraParceiro),
                    'employee_cost' => $this->convertPrice($this->custoEmployee),
                    'employee_extra' => $this->convertPrice($this->horaExtraEmployee),
                ]
            );
            DB::commit();

            $this->idGlobal = $idGlobal->id;
            return redirect()->to(route('orcamentos.editar', ['id' => $id]));
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($t, $value)
    {
        if (!in_array($t, ['categoryService', 'vehiclesCategory', 'typesVehicle', 'armored', 'bilingue', 'qtdHoras', 'driver', 'securityType'])) {
            return $this->skipRender();
        }

        $this->{$t} = $value;

        $this->updateServiceData();
    }

    //Preenche os campos de serviço apenas quando necessário
    public function updated($property)
    {
        if (in_array($property, ['categoryService', 'vehiclesCategory', 'typesVehicle', 'armored', 'bilingue', 'qtdHoras', 'driver', 'securityType'])) {
            $this->updateServiceData();
        } elseif (in_array($property, ['parceiro', 'qtdDias', 'qtdServices', 'precoBase', 'custoParceiro', 'custoEmployee'])) {
            $this->updateCostsAndTotal();
        }
    }

    public function updateServiceData()
    {
        $this->serviceTemp = $this->buscarServicoCadastrado();
        if ($this->serviceTemp && $this->serviceTemp->price > 0) {
            $this->preencherCamposDoServico();
        } else {
            $this->zerarCamposDoServico();
            $this->servicoCadastrado = 2;
        }
    }

    public function updateCostsAndTotal()
    {
        $this->total = $this->convertPrice($this->precoBase) * $this->qtdDias * $this->qtdServices;

        $this->dispatch('custosUpdated', $this->serviceId, [
            'qtdDias' => $this->qtdDias,
            'qtdServices' => $this->qtdServices,
            'precoBase' => $this->convertPrice($this->precoBase),
            'custoEmployee' => $this->convertPrice($this->custoEmployee),
            'custoParceiro' => $this->convertPrice($this->custoParceiro),
            'parceiro' => $this->parceiro,
        ]);

        $this->dispatch('totalUpdated', $this->serviceId, $this->total);
    }

    public function handleSelectedOptions($type, $key)
    {
        $this->{$type} = $key;
    }

    private function buscarServicoCadastrado()
    {
        if ($this->type == 'locacao') {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->categoryService)
                ->where('id_category_espec', $this->vehiclesCategory)
                ->where('id_vehicle', $this->typesVehicle)
                ->where('blindado_armado', $this->armored)
                ->where('bilingual', $this->bilingue)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        } else {
            // Lógica de consulta na tabela Service, usando os critérios do usuário (exemplo):
            return Service::where('id_category_service', $this->categoryService)
                ->where('id_category_espec', $this->securityType)
                ->where('blindado_armado', $this->armored)
                ->where('bilingual', $this->bilingue)
                ->where('driver', $this->driver)
                ->where('time', $this->qtdHoras)
                ->first(); // Retorna o primeiro serviço encontrado ou null
        }
    }

    private function preencherCamposDoServico()
    {
        $this->servicoCadastrado = 1;

        $this->precoBase = $this->serviceTemp->price;
        $this->horaExtra = $this->serviceTemp->extra_price;
        $this->kmBase = $this->serviceTemp->km;
        $this->kmExtra = $this->serviceTemp->km_extra;
        $this->custoParceiro = $this->serviceTemp->partner_cost;
        $this->extraParceiro = $this->serviceTemp->partner_extra_time;
        $this->kmExtraParceiro = $this->serviceTemp->partner_extra_km;
        $this->custoEmployee = $this->serviceTemp->employee_cost;
        $this->horaExtraEmployee = $this->serviceTemp->employee_extra;

        $this->dispatch('masksUpdated');
        $this->updateCostsAndTotal();
    }


    private function zerarCamposDoServico()
    {
        $this->servicoCadastrado = 2;
        $this->precoBase = 0;
        $this->horaExtra = 0;
        $this->kmBase = 0;
        $this->kmExtra = 0;
        $this->custoParceiro = 0;
        $this->extraParceiro = 0;
        $this->kmExtraParceiro = 0;
        $this->custoEmployee = 0;
        $this->horaExtraEmployee = 0;
    }

    public function render()
    {
        return view('livewire.service-os-item');
    }
}
