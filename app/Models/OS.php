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

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'id_payment_method');
    }

    public function paymentOption()
    {
        return $this->hasOne(PaymentOption::class, 'id', 'id_payment_options');
    }


    public function getInstallmentsAttribute()
    {
        $description = $this->paymentMethod->description;

        $twoTimesPayments = [
            '50% NA RESERVA 50% NO TÉRMINO DO SERVIÇO',
            '50% NA RESERVA 50% FATURADO PARA 30 DIAS',
            '50% NA RESERVA - 50% ANTES DO INÍCIO DO SERVIÇO',
        ];

        if (in_array($description, $twoTimesPayments)) {
            return 2;
        }

        return 1;
    }

    public function executions()
    {
        return $this->hasMany(OsExecution::class, 'id_os', 'id');
    }

    public function financialEntries()
    {
        return $this->hasMany(Financial::class, 'id_os', 'id')->where('type_transaction', Financial::ENTRADA);
    }
}
