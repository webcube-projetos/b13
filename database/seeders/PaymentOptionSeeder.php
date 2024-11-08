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
            ['description' => 'CARTÃO DE CRÉDITO', 'description_english' => 'Credit Card'],
            ['description' => 'CARTÃO DE DÉBITO', 'description_english' => 'Debit Card'],
            ['description' => 'DINHEIRO', 'description_english' => 'Cash'],
            ['description' => 'DEPÓSITO BANCÁRIO', 'description_english' => 'Bank Deposit'],
            ['description' => 'TRANSFERÊNCIA BANCÁRIA', 'description_english' => 'Bank Transfer'],
        ];

        foreach ($descriptions as $description) {
            PaymentOption::updateOrCreate($description);
        }
    }
}
