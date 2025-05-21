<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Pencairan;
use App\Models\PengajuanProposal;

class PencairanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pengajuanProposal = PengajuanProposal::all();
        foreach ($pengajuanProposal as $pengajuanProposal) {
            Pencairan::create([
                'nomor_pengajuan' => $pengajuanProposal->nomor_pengajuan,
                'catatan' => $faker->paragraph(1),
                'waktu' => $faker->dateTimeBetween('-1 years', '+1 years'),
                'dana_hibah_disetujui' => $faker->numberBetween(100000, 90000000),
                'disposisi_walikota' => $faker->boolean(),
                'disposisi_sekda' =>  $faker->boolean(),
                'disposisi_assisten' => $faker->boolean(),
                'disposisi_kabag' => $faker->boolean(),
                'sk_penetapan_walikota' => $faker->sentence(3),
                'nphd' => $faker->sentence(2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
