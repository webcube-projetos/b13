<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoSegurancaController extends Controller
{
    public function select()
    {
        $data =  [
            [
                'id' => 1,
                'nome' => 'Patrimonial',
            ],
            [
                'id' => 2,
                'nome' => 'Evento',
            ]
        ];

        return $data;
    }
}
