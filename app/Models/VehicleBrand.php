<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function getVehicleBrands()
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
