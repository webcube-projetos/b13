<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FakeModel;
use App\Models\VehicleBrand;
use Faker\Factory as Faker;

class MarcaController extends Controller
{
    public function select()
    {
        // Consultar todas as marcas de veículos ordenadas alfabeticamente
        $vehicleBrands = VehicleBrand::orderBy('nome', 'asc')->get();

        // Transformar os resultados em um array no formato desejado
        $data = [];
        foreach ($vehicleBrands as $index => $brand) {
            $data[] = [
                'id' => $index,
                'nome' => $brand->nome,
            ];
        }
 
        return $data;
    }
}
