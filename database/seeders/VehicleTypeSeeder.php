<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $brands = [
      [
        'name' => 'Sedan',
      ],
      [
        'name' => 'SUV',
      ],
      [
        'name' => 'Hatch',
      ]
    ];

    foreach ($brands as $brand) {
      VehicleType::updateOrCreate($brand);
    }
  }
}
