<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'adresses';

    protected $fillable = ['cep', 'street', 'number', 'complement', 'neighborhood', 'city', 'state', 'country'];
}
