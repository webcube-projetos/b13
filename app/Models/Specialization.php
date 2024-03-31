<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_english', 'description', 'id_ascendent'];


    public function children()
    {
        return $this->hasMany(Specialization::class, 'id_ascendent', 'id');
    }

    public function drivers()
    {
        return $this->hasManyThrough(
            Employee::class,
            ActiveSpecialization::class,
            'id_especializacao',
            'id',
            'id',
            'id_employee'
        )
            ->where('type', Employee::DRIVER);
    }
}
