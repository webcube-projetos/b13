<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank',
        'bank_number',
        'agency',
        'cc',
        'key_type',
        'key',
        'preference',
    ];
}
