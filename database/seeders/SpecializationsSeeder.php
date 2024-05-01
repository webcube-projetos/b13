<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cadastrar a primeira especialização
        $lingua = Specialization::create([
            'name' => 'Língua',
            'name_english' => 'Language',
            'description' => 'Línguas faladas pelos profissionais'
        ]);

        // Cadastrar as especializações filhas
        $ingles = Specialization::create([
            'id_ascendent' => $lingua->id,
            'name' => 'Inglês',
            'name_english' => 'English',
            'description' => null
        ]);

        $espanhol = Specialization::create([
            'id_ascendent' => $lingua->id,
            'name' => 'Espanhol',
            'name_english' => 'Spanish',
            'description' => null
        ]);
    }
}
