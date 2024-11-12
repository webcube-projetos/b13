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
use App\Models\PaymentOption;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;

class SelectComponent extends Component
{
    public $options;
    public $placeholder;
    public $name;
    public $required;
    public $selected;
    public $selectedPrimaryId;
    public $type;
    public $filter = null;
    public $target = null;
    public $targetClass = null;
    public $search = false;
    public $searchTerm = '';
    public $readonly = false;

    public function mount($type, $placeholder, $name, $selected, $filter = [], $targetClass = null, $search = false, $readonly = false, $required = false)
    {
        $this->type = $type;
        $this->readonly = $readonly;

        $this->search = $search;
        $this->name = $name;
        $this->selected = $selected ?? null;
        $this->targetClass = $targetClass;

        $this->required = $required;

        $this->filter = $filter;

        $this->getOptionsProperty();
    }

    public function getOptionsProperty()
    {
        $query = match ($this->type) {
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
            'paymentOptions' => $this->paymentOptions(),
            default => $this->especialization(),
        };


        if ($query instanceof Builder) {
            try {
                $filteredQuery = $this->createFilter($query);
                $this->options = $filteredQuery->get();
            } catch (\Exception $e) {
                abort(406, 'Erro ao filtrar dados, confira os filtros e tente novamente');
            }
        } else {
            $this->options = $query;
        }
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
            ->when(!$primary, fn($query) => $query->where('id_ascendent', $selectedPrimaryId));
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
            ->orderBy('name', 'ASC');
    }

    public function typesVehicle()
    {
        return VehicleType::select('id', 'name')
            ->orderBy('name', 'ASC');
    }

    public function categoryVehicle()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Vehicle'))
            ->orderBy('name', 'ASC');
    }

    public function categoryService()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Service'))
            ->orderBy('name', 'ASC');
    }

    public function securityType()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Security'))
            ->orderBy('name', 'ASC');
    }

    public function employee($type)
    {
        return Employee::select('id', 'name')
            ->where('type', $type)
            ->orderBy('name', 'ASC');
    }

    public function brands()
    {
        return VehicleBrand::select('id', 'name')
            ->orderBy('name', 'ASC');
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
            ->orderBy('created_at', 'desc');
    }

    public function servicesOS()
    {
        return Service::select('id', 'name')
            ->orderBy('created_at', 'desc');
    }

    public function servicesOSLoc()
    {
        return Service::select('id', 'name')
            ->where('id_service_type', 1)
            ->orderBy('created_at', 'desc');
    }

    public function servicesOSSeg()
    {
        return Service::select('id', 'name')
            ->where('id_service_type', 2)
            ->orderBy('created_at', 'desc');
    }

    public function vehiclesCategory()
    {
        return Category::select('id', 'name')
            ->whereHas('type', fn($query) => $query->where('name', 'Vehicle'))
            ->orderBy('created_at', 'desc');
    }

    public function vehicles()
    {
        return Vehicle::select('id', 'name')
            ->orderBy('created_at', 'desc');
    }

    public function vehiclesBrandPlate()
    {
        return Vehicle::select('vehicles.id', 'vehicles.plate', 'vehicle_brands.name as brand_name', 'vehicles.model')
            ->join('vehicle_brands', 'vehicles.id_brand', '=', 'vehicle_brands.id')
            ->orderBy('vehicle_brands.name', 'asc');
    }

    public function paymentMethod()
    {
        return PaymentMethod::select('id', 'description as name');
    }

    public function paymentOptions()
    {
        return PaymentOption::select('id', 'description as name');
    }

    public function createFilter($query)
    {
        $filtros = array_filter($this->filter, function ($item) {
            return !is_array($item) || count(array_filter($item, fn($value) => !is_null($value))) > 0;
        });

        if (!$filtros || empty($filtros)) {
            return $query;
        }

        foreach ($this->filter as $key => $value) {
            if ($this->isRelationship($query->getModel(), $key)) {
                foreach ($value as $relationKey => $relationValue) {
                    $query->whereHas($key, function ($q) use ($value, $relationKey, $relationValue) {
                        $relationTable = $q->getModel()->getTable();
                        if (is_array($relationValue)) {
                            $filtered = array_diff($relationValue, [null, '']);
                            if (count($filtered) > 0) {
                                $q->whereIn("$relationTable.$relationKey", $relationValue);
                            }
                        } elseif ($relationValue && !is_array($relationValue)) {
                            $relationKey = preg_replace('/\d+/', '', $relationKey);
                            $q->where("$relationTable.$relationKey", $relationValue);
                        }
                    });
                }
            } else {
                $mainTable = $query->getModel()->getTable();
                if (is_array($value) && count($value) > 0) {
                    $query->whereIn("$mainTable.$key", $value);
                } elseif ($value) {
                    $query->where("$mainTable.$key", $value);
                }
            }
        }

        if ($this->search && $this->searchTerm) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%');
            });
        }

        return $query;
    }

    protected function isRelationship($model, $key)
    {
        return method_exists($model, $key) && is_a($model->{$key}(), Relation::class);
    }

    public function updatedSearchTerm($value)
    {
        $this->getOptionsProperty();
    }

    public function updatingSelected($value)
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

        return $this->dispatch('selectUpdated', $this->type, $value);
    }
}
