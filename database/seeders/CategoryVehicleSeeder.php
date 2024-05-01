<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorys = [
            [
              'name' => 'Luxo',
              'name_english' => 'Lux',
              'type' => 3, 
            ],
        ];
      
        foreach ($categorys as $category) {
            Category::updateOrCreate($category);
        }
    }
}
