<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySecurity extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorys = [
            [
              'name' => 'Patrimonial',
              'name_english' => 'Patrimonial',
              'type' => 1, 
            ],
        ];
      
        foreach ($categorys as $category) {
            Category::updateOrCreate($category);
        }
    }
}
