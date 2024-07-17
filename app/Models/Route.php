<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $table = 'routes';

    protected $fillable = [
        'id_os_service_days',
        'location',
        'destination',
        'fligth_number',
        'assistant',
        'whatsapp_assistant',
        'passenger_list',
        'obs',
    ];
}
