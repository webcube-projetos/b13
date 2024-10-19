<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    use HasFactory;

    protected $table = 'os';

    protected $fillable = ['id_contact', 'id_client', 'id_payment_method', 'id_payment_options', 'obs', 'status', 'additional_cost'];

    public function contact()
    {
        return $this->hasOne(Contact::class, 'id', 'id_contact');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'id', 'id_client');
    }

    public function services()
    {
        return $this->hasMany(OsService::class, 'id_os', 'id');
    }
}
