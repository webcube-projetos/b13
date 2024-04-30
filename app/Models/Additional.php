<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_english',
        'description',
    ];

    public function vehicles()
    {
        return $this->hasMany(VehicleAdditional::class, 'additional_id', 'id');
    }
}
