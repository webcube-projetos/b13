<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    const DRIVER = 1;
    const SECURITY = 2;

    protected $fillable = [
        'type',
        'name',
        'fantasy_name',
        'nickname',
        'document',
        'armed',
        'driver',
        'phone',
        'email',
        'id_address',
        'id_company',
        'id_bank',
        'obs',
        'cnh',
        'cnv',
        'photo',
        'status'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address', 'id');
    }

    public function contacts()
    {
        return $this->hasManyThrough(
            Contact::class,
            EmployeeContact::class,
            'employee_id',
            'id',
            'id',
            'contact_id'
        );
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class, 'id_bank', 'id');
    }

    public function specializations()
    {
        return $this->hasManyThrough(
            Specialization::class,
            ActiveSpecialization::class,
            'id_employee',
            'id',
            'id',
            'id_especializacao'
        );
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id');
    }
}
