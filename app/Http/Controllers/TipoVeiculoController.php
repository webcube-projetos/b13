<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakeModel;
use Faker\Factory as Faker;

class TipoVeiculoController extends Controller
{
    public function select()
    {
        $faker = Faker::create('pt_BR');
        $faker->addProvider(new \Faker\Provider\FakeCar($faker));
        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] =  [
                'id' => $i,
                'nome' => $faker->randomElement(['SUV', 'Van', 'Sedan', 'Hatch', 'Mini Van']),
            ];
        }

        return $data;
    }
}
