<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_address',
        'id_contact',
        'id_bank',
        'document',
        'name',
        'fantasy_name',
        'nickname',
        'phone',
        'email',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address', 'id');
    }

    public function contacts()
    {
        return $this->hasManyThrough(
            Contact::class,
            ClientContact::class,
            'client_id',
            'id',
            'id',
            'contact_id'
        );
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class, 'id_bank', 'id');
    }
}
