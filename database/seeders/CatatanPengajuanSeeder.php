<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\CatatanPengajuan;
use App\Models\PengajuanProposal;

class CatatanPengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pengajuanProposal = PengajuanProposal::all();
        foreach ($pengajuanProposal as $pengajuanProposal) {
            CatatanPengajuan::create([
                'nomor_pengajuan' => $pengajuanProposal->nomor_pengajuan,
                'catatan' => $faker->paragraph(1),
                'waktu' => $faker->dateTimeBetween('-1 years', '+1 years'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
