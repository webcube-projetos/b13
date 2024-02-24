<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakeModel;
use Faker\Factory as Faker;

class TipoVeiculoController extends Controller
{
    public function select()
    {
        $data =  [
            [
                'id' => 1,
                'nome' => 'SUV',
            ],
            [
                'id' => 2,
                'nome' => 'Van',
            ],
            [
                'id' => 3,
                'nome' => 'Sedan',
            ],
            [
                'id' => 4,
                'nome' => 'Hatch',
            ],
            [
                'id' => 5,
                'nome' => 'Mini Van',
            ],
        ];

        return $data;
    }
}
