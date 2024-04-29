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
        'name' => 'Volkswagen',
      ],
      [
        'name' => 'Ford',
      ],
      [
        'name' => 'Toyota',
      ],
      [
        'name' => 'Hyundai',
      ]
    ];

    foreach ($brands as $brand) {
      VehicleBrand::updateOrCreate($brand);
    }
  }
}
