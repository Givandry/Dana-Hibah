<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\LaporanPertanggungjawaban;
use App\Models\PengajuanProposal;

class LaporanPertanggungjawabanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pengajuanProposal = \App\Models\PengajuanProposal::all();

        foreach ($pengajuanProposal as $pengajuanProposal) {
            LaporanPertanggungjawaban::create([
                'nomor_pengajuan' => $pengajuanProposal->nomor_pengajuan,
                'waktu' => $faker->dateTimeBetween('-1 years', '+1 years'),
                'file' => $faker->randomElement(['pdf', 'docx', 'xlsx', 'jpg', 'png']),
                'check' => $faker->boolean(),
                'catatan' => $faker->paragraph(1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}