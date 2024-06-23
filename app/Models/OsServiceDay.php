<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsServiceDay extends Model
{
    use HasFactory;

    protected $table = 'os_service_days';

    protected $fillable = [
        'id_os_service',
        'id_vehicle',
        'id_employee',
        'date',
        'start',
        'finish',
        'km_start',
        'km_finish',
        'toll',
        'parking',
    ];
}
