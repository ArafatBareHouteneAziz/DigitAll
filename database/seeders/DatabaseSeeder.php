<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BlogSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
