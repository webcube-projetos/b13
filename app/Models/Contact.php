<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'document', 'whatsapp', 'role'];

    public function client()
    {
        return $this->hasOneThrough(Client::class, ClientContact::class, 'contact_id', 'id', 'id', 'client_id');
    }
}
