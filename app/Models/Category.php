<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public const SERVICE = 1;
    public const VEHICLE = 2;
    public const SECURITY = 3;

    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'name_english',
        'description',
        'type'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'id_category_service', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'id_category', 'id');
    }

    //trocar pelo relacionamento correto
    public function security()
    {
        return $this->hasMany(Vehicle::class, 'id_category', 'id');
    }

    public function type()
    {
        return $this->belongsTo(CategoryType::class, 'type', 'id');
    }
}
