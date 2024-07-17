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
        'time',
        'extra_price',
        'km',
        'km_extra',
        'partner_cost',
        'partner_extra_time',
        'partner_extra_km',
        'employee_cost',
        'employee_extra',
    ];
}
