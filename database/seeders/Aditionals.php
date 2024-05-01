<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Additional;

class Aditionals extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $additionals = [
            [
              'name' => 'Teto solar',
              'name_english' => 'Sunroof',
            ],
            [
              'name' => 'TV',
              'name_english' => 'TV',
            ],
        ];
      
        foreach ($additionals as $additional) {
            Additional::updateOrCreate($additional);
        }
    }
}
