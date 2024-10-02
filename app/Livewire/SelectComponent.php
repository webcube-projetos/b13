<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\Specialization;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use App\Models\Employee;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Modelable;

class SelectComponent extends Component
{
    public $options;
    public $placeholder;
    public $name;
    public $required;
    public $selected;
    public $selectedPrimaryId;
    public $type;
    public $filterByTypeId = null;
    public $target = null;
    public $targetClass = null;

    public function mount($type, $placeholder, $name, $selected, $filterByTypeId = null, $targetClass = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->targetClass = $targetClass;

        $this->options = match ($type) {
            'especialization' => $this->especialization(),
            'especialization_primary' => $this->especialization(true),
            'especialization_general' => $this->especializationGeneral(true),
            'empresas' => $this->empresas(),
            'typesVehicle' => $this->typesVehicle(),
            'vehiclesCategory' => $this->categoryVehicle(),
            'selectBrand' => $this->brands(),
            'employee_driver' => $this->employee(1),
            'employee_security' => $this->employee(2),
            'armored' => $this->armored(),
            'bilingue' => $this->bilingue(),
            'armed' => $this->armed(),
            'driver' => $this->driver(),
            'categoryService' => $this->categoryService(),
            'securityType' => $this->securityType(),
            'client' => $this->client(),
            'services' => $this->services(),
            'servicesOS' => $this->servicesOS(),
            'servicesOSLoc' => $this->servicesOSLoc(),
            'servicesOSSeg' => $this->servicesOSSeg(),
            'vehiclesCategory' => $this->vehiclesCategory(),
            'vehicles' => $this->vehicles(),
            'vehicles_plate' => $this->vehiclesBrandPlate(),
            'languages' => $this->languages(),
            'paymentMethod' => $this->paymentMethod(),
            default => $this->especialization(),
        };
        $this->filterByTypeId = $filterByTypeId; // Armazenar o ID do tipo de veículo
    }

    public function render()
    {
        return view('livewire.select-component', [
            'placeholder' => $this->placeholder
        ]);
    }

    public function especialization($primary = false, $selectedPrimaryId = null)
    {
        return Specialization::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->when($primary, fn($query) => $query->whereNull('id_ascendent'))
            ->when(!$primary, fn($query) => $query->where('id_ascendent', $selectedPrimaryId))
            ->get();
    }

    public function especializationGeneral()
    {
        //Todas as especializações exceto a Língua
        return Specialization::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->whereNotNull('id_ascendent')
            ->where('id_ascendent', '!=', 1)
            ->get();
    }

    public function languages()
    {
        return Specialization::select('id', 'name')
            ->where('id_ascendent', 1)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function empresas()
    {
        return Company::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function typesVehicle()
    {
        return VehicleType::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function categoryVehicle()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Vehicle'))
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function categoryService()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Service'))
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function securityType()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Security'))
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function employee($type)
    {
        return Employee::select('id', 'name')
            ->where('type', $type)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function brands()
    {
        return VehicleBrand::select('id', 'name')
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function armored()
    {
        return collect([
            ['id' => 1, 'name' => 'Sim'],
            ['id' => 0, 'name' => 'Não'],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function bilingue()
    {
        return collect([
            ['id' => 1, 'name' => 'Sim'],
            ['id' => 0, 'name' => 'Não'],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function armed()
    {
        return collect([
            ['id' => 1, 'name' => 'Sim'],
            ['id' => 0, 'name' => 'Não'],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function driver()
    {
        return collect([
            ['id' => 1, 'name' => 'Sim'],
            ['id' => 0, 'name' => 'Não'],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function client()
    {
        return collect([
            ['id' => 1, 'name' => 'Sim'],
            ['id' => 0, 'name' => 'Não'],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function services()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Service'))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function servicesOS()
    {
        return Service::select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function servicesOSLoc()
    {
        return Service::select('id', 'name')
            ->where('id_service_type', 1)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function servicesOSSeg()
    {
        return Service::select('id', 'name')
            ->where('id_service_type', 2)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function vehiclesCategory()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Vehicle'))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function vehicles()
    {
        return Vehicle::select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function vehiclesBrandPlate()
    {
        return Vehicle::select('vehicles.id', 'vehicles.plate', 'vehicle_brands.name as brand_name', 'vehicles.model')
            ->join('vehicle_brands', 'vehicles.id_brand', '=', 'vehicle_brands.id')
            ->when($this->filterByTypeId, function ($query) { // Filtrar pelo tipo de veículo, se fornecido
                $query->where('vehicles.id_type', $this->filterByTypeId);
            })
            ->orderBy('vehicle_brands.name', 'asc')
            ->get();
    }

    public function paymentMethod()
    {
        return PaymentMethod::select('id', 'description as name')->get();
    }

    public function updatedSelected($value)
    {
        if ($this->target) {
            if ($this->targetClass) {
                return $this->dispatch('selectUpdated', $this->type, $value, $this->target)->to($this->targetClass);
            }

            return $this->dispatch('selectUpdated', $this->type, $value, $this->target);
        }

        if ($this->targetClass) {
            return $this->dispatch('selectUpdated', $this->type, $value, $this->target)->to($this->targetClass);
        }


        $this->dispatch('selectUpdated', $this->type, $value);
    }
}
