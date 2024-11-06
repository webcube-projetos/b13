<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    const NAO_PAGO = 0;
    const PAGO = 1;
    const ENTRADA = 1;
    const SAIDA = 0;

    protected $table = 'financial';

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

    public function os()
    {
        return $this->belongsTo(OS::class, 'id_os');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'id_client');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'id_company');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'id_employee');
    }

    public function companyExpenses()
    {
        return $this->hasMany(FinancialItem::class, 'id_os', 'id_os')
            ->where('id_company', $this->id_company);
    }

    public function employeeExpenses()
    {
        return $this->hasMany(FinancialItem::class, 'id_os', 'id_os')
            ->where('id_employee', $this->id_employee);
    }

    public function getTypeAttribute()
    {
        return $this->type_transaction == 1 ? 'Entrada' : 'Saida';
    }
}
