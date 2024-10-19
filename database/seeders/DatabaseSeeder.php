<?php

namespace Database\Seeders;

use App\Models\PaymentOption;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     SpecializationsSeeder::class
        // ]);

        $this->call([
            CategorySecuritySeeder::class,
            CategoryServiceSeeder::class,
            CategoryTypeSeeder::class,
            CategoryVehicleSeeder::class,
            CompanySeeder::class,
            FreelanceSeeder::class,
            ServiceTypeSeeder::class,
            SpecializationsSeeder::class,
            UserSeeder::class,
            VehicleBrandSeeder::class,
            VehicleTypeSeeder::class,
            PaymentMethodSeeder::class,
            PaymentOptionSeeder::class
        ]);
    }
}
