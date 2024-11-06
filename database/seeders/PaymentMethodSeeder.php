<?php

namespace Database\Seeders;

use App\Models\OS;
use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Se as desciptions mudarem, precisa ser atualizado na model OS
        $descriptions = [
            ['description' => 'A VISTA'],
            ['description' => '50% NA RESERVA 50% NO TÉRMINO DO SERVIÇO'],
            ['description' => '50% NA RESERVA 50% FATURADO PARA 30 DIAS'],
            ['description' => '50% NA RESERVA - 50% ANTES DO INÍCIO DO SERVIÇO'],
            ['description' => '100 % NA RESERVA'],
            ['description' => '100% ANTES DO INÍCIO DO SERVIÇO'],
            ['description' => '100% NO TÉRMINO DO SERVIÇO'],
            ['description' => 'FATURADO - 15 DIAS'],
            ['description' => 'FATURADO - 30 DIAS'],
        ];

        foreach ($descriptions as $description) {
            PaymentMethod::updateOrCreate($description);
        }

        OS::query()->update(['id_payment_method' => NULL]);
        PaymentMethod::whereNotIn('description', $descriptions)->delete();
    }
}
