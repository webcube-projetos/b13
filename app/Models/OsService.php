<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsService extends Model
{
    use HasFactory;

    protected $table = 'os_services';

    protected $fillable = [
        'id_os',
        'id_service',
        'qtd_days',
        'start',
        'finish',
        'price',
        'discount',
        'discount_type',
        'time',
        'extra_price',
        'qtd_service',
        'modelo_veiculo',
        'passengers',
        'bags',
        'km',
        'km_extra',
        'partner_cost',
        'partner_extra_time',
        'partner_extra_km',
        'employee_cost',
        'employee_extra',
    ];

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'id_service');
    }

    public function os()
    {
        return $this->hasOne(OS::class, 'id', 'id_os');
    }

    public function motoristas()
    {
        return $this->hasMany(OsEmployeeVehicle::class, 'id_service_os', 'id');
    }
}
