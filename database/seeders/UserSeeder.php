<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@b13company.com',
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
      
        foreach ($users as $user) {
            User::firstOrCreate(['email' => $user['email']], $user);
        };
    }
}
