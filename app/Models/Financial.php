<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $table = 'financial';

    protected $fillable = [
        'id_os',
        'id_os_service',
        'type_transaction',
        'id_client',
        'id_employee',
        'id_company',
        'quote',
        'value',
    ];
}
