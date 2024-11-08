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
            ['description' => 'A VISTA', 'description_english' => 'Cash'],
            ['description' => '50% NA RESERVA 50% NO TÉRMINO DO SERVIÇO', 'description_english' => '50% Upon Reservation 50% Upon Service Completion'],
            ['description' => '50% NA RESERVA 50% FATURADO PARA 30 DIAS', 'description_english' => '50% Upon Reservation 50% Invoiced for 30 Days'],
            ['description' => '50% NA RESERVA - 50% ANTES DO INÍCIO DO SERVIÇO', 'description_english' => '50% Upon Reservation 50% Before Service Start'],
            ['description' => '100 % NA RESERVA', 'description_english' => '100% Upon Reservation'],
            ['description' => '100% ANTES DO INÍCIO DO SERVIÇO', 'description_english' => '100% Before Service Start'],
            ['description' => '100% NO TÉRMINO DO SERVIÇO', 'description_english' => '100% Upon Service Completion'],
            ['description' => 'FATURADO - 15 DIAS', 'description_english' => 'Invoiced - 15 Days'],
            ['description' => 'FATURADO - 30 DIAS', 'description_english' => 'Invoiced - 30 Days'],
        ];
    
        foreach ($descriptions as $description) {
            PaymentMethod::updateOrCreate(['description' => $description['description']], $description);
        }
    
        OS::query()->update(['id_payment_method' => NULL]);
        PaymentMethod::whereNotIn('description', array_column($descriptions, 'description'))->delete();
    }
}
