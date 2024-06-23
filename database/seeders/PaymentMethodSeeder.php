<?php

namespace Database\Seeders;

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
        $descriptions = [
            [
                'description' => 'Entrada 50% + 50% ',
            ],
            [
                'description' => '100% antes do início do serviço',
            ],
            [
                'description' => 'Entrada 50% + 25% + 25%',
            ],
            [
                'description' => '100% após o início do serviço',
            ],
            [
                'description' => '30/60/90',
            ]
        ];

        foreach ($descriptions as $description) {
            PaymentMethod::updateOrCreate($description);
        }
    }
}
