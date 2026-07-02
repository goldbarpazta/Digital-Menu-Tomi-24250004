<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@restaurant.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@restaurant.com'],
            [
                'name' => 'Demo User',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );

        $this->call([
            MenuSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
