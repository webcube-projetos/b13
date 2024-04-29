<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use App\Models\ServiceType;
use App\Models\VehicleBrand;
use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class ServiceTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $brands = [
      [
        'name' => 'Locação',
      ],
      [
        'name' => 'Segurança',
      ],
    ];

    foreach ($brands as $brand) {
      ServiceType::updateOrCreate($brand);
    }
  }
}
