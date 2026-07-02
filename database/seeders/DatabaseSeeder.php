<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Restaurant',
            'email' => 'admin@restaurant.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            MenuSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
