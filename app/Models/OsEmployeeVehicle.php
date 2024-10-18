<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsEmployeeVehicle extends Model
{
    use HasFactory;

    protected $table = 'os_employee_vehicles';

    protected $fillable = [
        'id_os',
        'id_service_os',
        'id_employee',
        'id_company',
        'id_vehicle',
        'language',
        'speciality',
        'start',
        'end'
    ];

    public function executions()
    {
        return $this->hasMany(OsExecution::class, 'id_employee_vehicle', 'id');
    }

    public function oSService()
    {
        return $this->belongsTo(OsService::class, 'id_service_os', 'id');
    }
}
