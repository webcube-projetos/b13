<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAdditional extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'additional_id',
    ];
}
