<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\RumahIbadah;
use App\Models\Jenis;

class RumahIbadahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = Jenis::first();
        $faker = Faker::create('id_ID');

        $jenis_rumah_ibadah = [
            'Masjid' => ['Ar-Rahman', 'Al-Falah', 'An-Nur', 'Al-Muttaqin'],
            'Gereja' => ['Santo Paulus', 'Santo Petrus', 'Immanuel', 'Bethlehem', 'Katedral'],
            'Pura' => ['Agung Jagatnatha', 'Dalem', 'Besakih', 'Ulun Danu', 'Luhur Uluwatu'],
            'Vihara' => ['Dharma Bhakti', 'Borobudur', 'Avalokitesvara', 'Dharmayana', 'Maha Vihara'],
            'Klenteng' => ['Tian Hou', 'Kim Tek Ie', 'Ling Gwan Kiong', 'Buddha Sakya', 'Xian Ma'],
        ];

        foreach (range(1, 10) as $index) {
            $jenis = array_rand($jenis_rumah_ibadah);
            $nama = $jenis . ' ' . $faker->randomElement($jenis_rumah_ibadah[$jenis]);
            DB::table('rumah_ibadah')->insert([ 
                'nama_rumah_ibadah' => $nama,
                'alamat' => $faker->address,
                'kelurahan' => $faker->streetName,
                'kecamatan' => $faker->city,
                'no_hp' => substr($faker->phoneNumber, 0, 15),
                'email' => $faker->safeEmail,
                'jenis_id' => Jenis::inRandomOrder()->first()->id ?? 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
