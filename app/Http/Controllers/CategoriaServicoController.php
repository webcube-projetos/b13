<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaServicoController extends Controller
{
    public function select()
    {
        $data = [
            ['id' => 1, 'nome' => 'Transfer'],
            ['id' => 2, 'nome' => 'Diária'],
            ['id' => 3, 'nome' => 'Travel'],
        ];

        return $data;
    }
}
