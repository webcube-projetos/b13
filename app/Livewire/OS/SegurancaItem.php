<?php

namespace App\Livewire\OS;

use App\Livewire\SelectComponent;
use App\Models\OsEmployeeVehicle;
use App\Models\OsExecution;
use App\Models\OsService;
use App\Models\Vehicle;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;


class SegurancaItem extends Component
{
    public $seguranca;
    public $index;
    public $empresas;
    public $languages;
    public $vehicles_plate;
    public $especialization_general;
    public $employee_security;
    public $start;
    public $end;

    public $serviceId;
    public $segurancaId;
    public $vehicleCompany;

    public $typesVehicle;
    public $targetClass = SegurancaItem::class;

    public function mount($seguranca = null)
    {
        if ($seguranca) {
            $this->segurancaId = $seguranca['id'];
            $this->serviceId = $seguranca['serviceId'];

            if ($this->serviceId) {
                $services = OsService::find($this->serviceId);
                $this->typesVehicle = $services->service->vehicleType->id ?? '';
            }

            $segurancaCadastrado = OsEmployeeVehicle::find($seguranca['id']);

            if ($segurancaCadastrado) {
                $this->empresas = $segurancaCadastrado->id_company ?? '';
                $this->languages = $segurancaCadastrado->language;
                $this->vehicles_plate = $segurancaCadastrado->id_vehicle;
                $this->especialization_general = $segurancaCadastrado->speciality;
                $this->employee_security = $segurancaCadastrado->id_employee;
                $this->start = $segurancaCadastrado->start;
                $this->end = $segurancaCadastrado->end;
            }
        }
    }

    #[On('typesVehicleUpdated')]
    public function updatedtypesVehicle($value, $serviceId)
    {
        if ($serviceId != $this->serviceId) {
            return $this->skipRender();
        }
        $this->typesVehicle = $value;
    }

    public function deleteSeguranca($segurancaId)
    {
        $this->dispatch('deleteSeguranca', $segurancaId);
    }

    #[On('selectUpdated')]
    public function handleSelectUpdated($type, $value, $target = null)
    {
        if (!in_array($type, ['empresas', 'languages', 'vehicles_plate', 'especialization_general', 'employee_security'])) {
            return $this->skipRender();
        }

        if ($target) {
            $targetParts = explode('-', $target);
            $segurancaId = end($targetParts);

            if ($segurancaId == $this->segurancaId) {
                $this->{$type} = $value;

                if ($type == 'vehicles_plate') {
                    $this->vehicleCompany = Vehicle::find($value)?->id_company;
                }
            }
        }
    }

    #[On('os-service-created')]
    public function handleOsServiceCreated($id)
    {
        if ($id == $this->serviceId) {
            $segurancas = OsEmployeeVehicle::find($this->segurancaId);
            $os = OsService::find($this->serviceId)->os->id;

            if (!$segurancas) {
                $segurancas = OsEmployeeVehicle::where('start', $this->start)
                    ->where('end', $this->end)
                    ->where('id_service_os', $this->serviceId)
                    ->first();

                if (!$segurancas) {
                    $segurancas = new OsEmployeeVehicle();
                }
            }

            $segurancas->fill(
                [
                    'start' => $this->start,
                    'end' => $this->end,
                    'id_company' => null,
                    'language' => $this->languages,
                    'id_vehicle' => $this->vehicles_plate,
                    'speciality' => $this->especialization_general,
                    'id_employee' => $this->employee_driver ?? $this->employee_security,
                    'id_service_os' => $this->serviceId,
                    'id_os' => $os
                ]
            )->save();

            $startDate = Carbon::parse($this->start);
            $endDate = Carbon::parse($this->end);

            $execucoesCadastradas = OsExecution::where('id_employee_vehicle', $segurancas->id)->get();

            $execucoesExcluidas = $execucoesCadastradas->whereNotBetween('date', [$startDate, $endDate]);
            foreach ($execucoesExcluidas as $execucao) {
                $execucao->delete();
            }

            while ($startDate->lte($endDate)) {
                OsExecution::firstOrCreate([
                    'id_employee_vehicle' => $segurancas->id,
                    'id_os' => $os,
                    'date' => $startDate->format('Y-m-d'),
                ]);

                $startDate->addDay();
            }

            $this->dispatch('reload-executions');
        }
    }

    public function render()
    {
        return view('livewire.o-s.seguranca-item');
    }
}
