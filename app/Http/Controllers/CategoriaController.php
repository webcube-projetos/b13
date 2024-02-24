<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function select()
    {
        $data = [
            ['id' => 1, 'nome' => 'Executivo'],
            ['id' => 2, 'nome' => 'Luxo'],
            ['id' => 3, 'nome' => 'Cargo'],
        ];

        return $data;
    }
}
