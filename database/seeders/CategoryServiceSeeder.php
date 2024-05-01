<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorys = [
            [
              'name' => 'Diária',
              'name_english' => 'Daily',
              'type' => 2, 
            ],
            [
              'name' => 'Travel',
              'name_english' => 'Travel',
              'type' => 2, 
            ],
        ];
      
        foreach ($categorys as $category) {
        Category::updateOrCreate($category);
        }
    }
}
