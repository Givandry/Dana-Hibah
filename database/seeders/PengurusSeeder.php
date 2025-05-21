<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Pengurus;
use App\Models\RumahIbadah;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        foreach (range(1, 10) as $index) {
            DB::table('pengurus')->insert([
                'nama_lengkap' => $faker->name,
                'alamat' => $faker->address,
                'kelurahan' => $faker->city,
                'kecamatan' => $faker->streetName,
                'no_hp' => substr($faker->phoneNumber, 0, 15),
                'email' => $faker->safeEmail,
                'jabatan' => $faker->jobTitle,
                'rumah_ibadah_id' => RumahIbadah::inRandomOrder()->first()->id ?? 1,
                'password' => $faker->password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
