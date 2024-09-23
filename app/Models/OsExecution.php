<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OsExecution extends Model
{
    use HasFactory;

    protected $table = 'os_executions';

    protected $fillable = [
        'id_employee_vehicle',
        'day',
        'identification',
        'date',
        'start_time',
        'end_time',
        'total_time',
        'exceed_time',
        'km_start',
        'km_end',
        'km_total',
        'km_exceed',
        'toll',
        'parking',
        'another_expenses',
    ];
}
