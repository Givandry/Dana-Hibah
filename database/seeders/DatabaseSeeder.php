<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\JenisSeeder;
use Database\Seeders\RegulasiSeeder;
use Database\Seeders\RumahIbadahSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JenisSeeder::class,
            RegulasiSeeder::class,
            RumahIbadahSeeder::class,
        ]);
    }
}