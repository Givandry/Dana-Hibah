<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Regulasi;

class RegulasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 10) as $index) {
            DB::table('regulasi')->insert([
                'judul' => $faker->sentence(4), // Judul dokumen
                'file' => $faker->randomElement(['pdf', 'docx', 'xlsx', 'jpg', 'png']), // Bentuk file
                'aktif' => $faker->boolean(), // Status aktif
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
