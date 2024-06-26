<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveSpecialization extends Model
{
    use HasFactory;

    protected $table = 'actives_specializations';

    protected $fillable = [
        'id_especializacao',
        'id_employee',
    ];
}
