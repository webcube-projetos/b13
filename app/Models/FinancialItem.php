<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialItem extends Model
{
    use HasFactory;

    protected $table = 'financial_itens';

    protected $fillable = [
        'id_os',
        'id_execution',
        'id_client',
        'id_employee',
        'id_company',
        'total',
    ];

    public function execution()
    {
        return $this->hasOne(OsExecution::class, 'id', 'id_execution');
    }
}
