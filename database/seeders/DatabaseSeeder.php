<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            HobbySeeder::class,
            UserSeeder::class,
            WishlistSeeder::class,
            ChatSeeder::class,
            ChatSecondSeeder::class,
        ]);
    }
}