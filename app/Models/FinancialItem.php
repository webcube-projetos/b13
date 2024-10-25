<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialItem extends Model
{
    use HasFactory;

    protected $table = 'financial';

    protected $fillable = [
        'id_os',
        'id_execution',
        'id_client',
        'id_employee',
        'id_company',
        'total',
    ];
}
