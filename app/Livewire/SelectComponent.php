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

    public function mount($type, $placeholder, $name, $selected)
    {
        $this->type = $type;
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->options = match ($type) {
            'especialization' => $this->especialization(),
            'especialization_primary' => $this->especialization(true),
            'empresas' => $this->empresas(),
            'typesVehicle' => $this->typesVehicle(),
            'vehiclesCategory' => $this->categoryVehicle(),
            'selectBrand' => $this->brands(),
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
            'languages' => $this->languages(),
            'paymentMethod' => $this->paymentMethod(),
            default => $this->especialization(),
        };
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
            ->when($primary, fn ($query) => $query->whereNull('id_ascendent'))
            ->when(!$primary, fn ($query) => $query->where('id_ascendent', $selectedPrimaryId))
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
            ->whereHas('type', fn ($query) => $query->where('name', 'Vehicle'))
            ->orderBy('name', 'ASC')
            ->get();
    }
    
    public function categoryService()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn ($query) => $query->where('name', 'Service'))
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function securityType()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn ($query) => $query->where('name', 'Security'))
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
            ->whereHas('type', fn ($query) => $query->where('name', 'Service'))
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
            ->whereHas('type', fn ($query) => $query->where('name', 'Vehicle'))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function vehicles()
    {
        return Vehicle::select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function paymentMethod()
    {
        return PaymentMethod::select('id', 'description as name')->get();
    }

    public function updatedSelected($value)
    {
        $this->dispatch('selectUpdated', $this->type, $value);
    }
}
