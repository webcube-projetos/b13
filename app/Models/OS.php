<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    use HasFactory;

    protected $table = 'os';

    protected $fillable = ['id_contact', 'id_client', 'id_payment_method', 'status', 'additional_cost'];
}
