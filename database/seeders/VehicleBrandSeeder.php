<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use App\Models\VehicleBrand;
use Illuminate\Database\Seeder;

class VehicleBrandSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $brands = [
      [
        'name' => 'Acura',
      ],
      [
        'name' => 'Alfa Romeo',
      ],
      [
        'name' => 'AM General',
      ],
      [
        'name' => 'Aston Martin',
      ],
      [
        'name' => 'Audi',
      ],
      [
        'name' => 'Austin',
      ],
      [
        'name' => 'Bentley',
      ],
      [
        'name' => 'BMW',
      ],
      [
        'name' => 'BYD',
      ],
      [
        'name' => 'Caoa Chery',
      ],
      [
        'name' => 'Chevrolet',
      ],
      [
        'name' => 'Chrysler',
      ],
      [
        'name' => 'Citroën',
      ],
      [
        'name' => 'Dodge',
      ],
      [
        'name' => 'Ferrari',
      ],
      [
        'name' => 'Fiat',
      ],
      [
        'name' => 'Ford',
      ],
      [
        'name' => 'Great Wall',
      ],
      [
        'name' => 'Honda',
      ],
      [
        'name' => 'Hyundai',
      ],
      [
        'name' => 'JAC',
      ],
      [
        'name' => 'Jaguar',
      ],
      [
        'name' => 'JEEP',
      ],
      [
        'name' => 'Kia',
      ],
      [
        'name' => 'Lamborghini',
      ],
      [
        'name' => 'Land Rover',
      ],
      [
        'name' => 'Lexus',
      ],
      [
        'name' => 'Lifan',
      ],
      [
        'name' => 'Maserati',
      ],
      [
        'name' => 'McLaren',
      ],
      [
        'name' => 'Mercedes-Benz',
      ],
      [
        'name' => 'Mini',
      ],
      [
        'name' => 'Mitsubishi',
      ],
      [
        'name' => 'Nissan',
      ],
      [
        'name' => 'Peugeot',
      ],
      [
        'name' => 'Porsche',
      ],
      [
        'name' => 'Ram',
      ],
      [
        'name' => 'Renault',
      ],
      [
        'name' => 'Rolls Royce',
      ],
      [
        'name' => 'Royal Enfield',
      ],
      [
        'name' => 'Seres',
      ],
      [
        'name' => 'Smart',
      ],
      [
        'name' => 'Subaru',
      ],
      [
        'name' => 'Suzuki',
      ],
      [
        'name' => 'Toyota',
      ],
      [
        'name' => 'Triumph',
      ],
      [
        'name' => 'Troller',
      ],
      [
        'name' => 'Volkswagen',
      ],
      [
        'name' => 'Volvo',
      ],
      [
        'name' => 'Yamaha',
      ],
    ];

    foreach ($brands as $brand) {
      VehicleBrand::updateOrCreate($brand);
    }
  }
}
