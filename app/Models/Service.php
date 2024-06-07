<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_english',
        'blindado_armado',
        'bilingual',
        'driver',
        'price',
        'time',
        'extra_price',
        'km',
        'km_extra',
        'partner_cost',
        'partner_extra_time',
        'partner_extra_km',
        'employee_cost',
        'employee_extra',
        'id_category_service',
        'id_category_espec',
        'id_service_type',
        'id_vehicle',
    ];

    protected $attributes = [
        'driver' => 0,
    ];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'id_service_type', 'id');
    }

    public function categoryService()
    {
        return $this->belongsTo(Category::class, 'id_category_service', 'id');
    }
}
