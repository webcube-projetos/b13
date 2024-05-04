<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorys = [
            [
                'name' => 'Pessoal',
                'name_english' => 'Personal Security',
                'type' => 1, 
            ],
            [
                'name' => 'Guarda Costas',
                'name_english' => 'Body Guard',
                'type' => 1, 
            ],
            [
                'name' => 'Escolta',
                'name_english' => 'Escort',
                'type' => 1, 
            ],
            [
                'name' => 'Escolta com Viatura',
                'name_english' => 'Escort with Vehicle',
                'type' => 1, 
            ],
            [
                'name' => 'Escolta armada',
                'name_english' => 'Escort armed',
                'type' => 1, 
            ],
            [
                'name' => 'Eventos',
                'name_english' => 'Events',
                'type' => 1, 
            ],
        ];
      
        foreach ($categorys as $category) {
            Category::updateOrCreate($category);
        }
    }
}
