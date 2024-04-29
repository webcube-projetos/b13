<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_type',
        'id_company',
        'id_category',
        'id_brand',
        'year',
        'armored',
        'passengers',
        'bags',
        'expiration_date',
        'plate',
        'insurance',
        'photo',
        'doc_photo',
    ];

    public function additionals()
    {
        return $this->hasManyThrough(
            Additional::class,
            VehicleAdditional::class,
            'vehicle_id',
            'id',
            'id',
            'additional_id'
        );
    }

    public function type()
    {
        return $this->hasOne(VehicleType::class, 'id', 'id_type');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'id_company');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }

    public function brand()
    {
        return $this->hasOne(VehicleBrand::class, 'id', 'id_brand');
    }
}
