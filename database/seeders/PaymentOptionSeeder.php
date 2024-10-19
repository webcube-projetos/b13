<?php

namespace Database\Seeders;

use App\Models\PaymentOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $descriptions = [
            ['description' => 'CARTÃO DE CRÉDITO'],
            ['description' => 'CARTÃO DE DEBITO'],
            ['description' => 'DINHEIRO'],
            ['description' => 'DEPÓSITO BANCÁRIO'],
            ['description' => 'TRANSFERÊNCIA BANCÁRIA'],
        ];

        foreach ($descriptions as $description) {
            PaymentOption::updateOrCreate($description);
        }
    }
}
