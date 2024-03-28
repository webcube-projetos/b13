<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use Illuminate\Database\Seeder;

class CategoryTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categoryTypes = [
      [
        'name' => 'Security',
      ],
      [
        'name' => 'Service',
      ],
      [
        'name' => 'Vehicle',
      ]
    ];

    foreach ($categoryTypes as $categoryType) {
      CategoryType::updateOrCreate($categoryType);
    }
  }
}
