<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Jenis;


class JenisSeeder extends Seeder
{
    public function run():void
    {
        $faker = Faker::create('id_ID');
        $jenis_rumah_ibadah = ['Masjid', 'Gereja', 'Pura', 'Vihara', 'Klenteng'];

        foreach ($jenis_rumah_ibadah as $item) {
            DB::table('jenis')->insert([
                'jenis_rumah_ibadah' => $item,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

