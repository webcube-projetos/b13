<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    const NAO_PAGO = 0;
    const PAGO = 1;
    const ENTRADA = 1;
    const SAIDA = 0;

    protected $fillable = [
        'id_os',
        'id_client',
        'id_company',
        'id_employee',
        'installment',
        'status',
        'type_transaction',
        'date',
        'total',
    ];

    use HasFactory;
}
