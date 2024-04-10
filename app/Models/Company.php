<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_address',
        'id_bank',
        'document',
        'name',
        'fantasy_name',
        'nickname',
    ];

    protected $table = 'companies';

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address', 'id');
    }

    public function contacts()
    {
        return $this->hasManyThrough(
            Contact::class,
            CompanyContact::class,
            'company_id',
            'id',
            'id',
            'contact_id'
        );
    }
}
