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
    ];
}
