<?php

namespace App\Livewire\OS;

use Livewire\Component;
use App\Models\Service;
use App\Models\Vehicle;
use Livewire\Attributes\On;

class Services extends Component
{
    public $serviceId;
    public $type;
    public $idGlobal;
    public $service = [];
    public $securityType;
    public $bilingue;
    public $armored;
    public $driver;
    public $serviceTemp;
    public $servicoCadastrado;
    public $idOnServiceTable; 
    public $valoresComplete = false;
    public $servicoComplete = false;

    public function mount($serviceId = null, $type = null, $idGlobal = null)
    {
        $this->serviceId = $serviceId;
        $this->type = $type;
        $this->idGlobal = $idGlobal;
        $this->securityType = $this->securityType;
        $this->bilingue = $this->bilingue;
        $this->armored = $this->armored;
        $this->driver = $this->driver;
        $this->servicoCadastrado = $this->servicoCadastrado;
    }

    #[On('valoresCreated')]
    public function handleValoresCreated($id, $data)
    {
        $this->skipRender();
        
        if ($id == $this->serviceId) {
            $this->service = array_merge($this->service, $data);
            $this->valoresComplete = true;
            $this->checkIfServiceIsComplete();
        }
    }

    #[On('servicoCreated')]
    public function handleServicoCreated($id, $serviceData, $data)
    {
        $this->skipRender();

        
        //Verifica se o serviço deve ser criado ou se já existe;
        $this->servicoCadastrado ? $serviceData : false;

        if ($id == $this->serviceId) {
            $this->service = array_merge($this->service, $data);
            $this->servicoComplete = true;
            $this->checkIfServiceIsComplete();
        }
    }

    public function checkIfServiceIsComplete()
    {
        
        //Check if valores and servico is received
        if ($this->valoresComplete && $this->servicoComplete) 
        {
            //Verifica se não tem um serviceId (id na tabela os_services) atribuido
            if (!$this->serviceId) {

                //Se o serviço ainda não está cadastro
                if(!$this->servicoCadastrado)
                {
                    //Se o serviço não existe
                    $newService = Service::create(
                        [
                            'id_category_service' => $this->service['id_category_service'],
                            'id_category_espec' => $this->service['id_category_espec'],
                            'id_service_type' => $this->service['service'],
                            'id_vehicle' => $this->service['id_vehicle'],
                            'name' => $this->service['name'],
                            'name_english' => $this->service['name_english'],
                            'blindado_armado' => $this->service['blindado_armado'],
                            'bilingual' => $this->service['bilingual'],
                            'driver' => $this->service['driver'] ?? null,
                            'price' => $this->service['price'],
                            'time' => $this->service['time'],
                            'extra_price' => $this->service['extra_price'],
                            'km' => $this->service['km'],
                            'km_extra' => $this->service['km_extra'],
                            'partner_cost' => $this->service['partner_cost'],
                            'partner_extra_time' => $this->service['partner_extra_time'],
                            'partner_extra_km' => $this->service['partner_extra_km'],
                            'employee_cost' => $this->service['employee_cost'],
                            'employee_extra' => $this->service['employee_extra']
                        ]
                    );

                    $this->idOnServiceTable = [
                        'id_service' => $newService->id,
                    ];
                } else { 
                    //Get service id
                    $this->idOnServiceTable = [
                        'id_service' => $this->servicoCadastrado->id,
                    ];
                }

                //Passa o id do serviço existente
                $this->service = array_merge($this->service, $this->idOnServiceTable);
            }

            //dispatch to TabServicos.php
            $this->dispatch('osService', $this->serviceId, $this->service);
        }
    }

    public function render()
    {
        return view('livewire.o-s.services');
    }
}
