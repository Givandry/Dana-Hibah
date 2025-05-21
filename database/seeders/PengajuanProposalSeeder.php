<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\PengajuanProposal;
use App\Models\RumahIbadah;

class PengajuanProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create('id_ID');

        foreach (range(1, 10) as $index) {
            $pengajuanProposal = PengajuanProposal::create([
                'nomor_pengajuan' => $faker->unique()->numberBetween(1, 100), // Judul dokumen
                'rumah_ibadah_id' => RumahIbadah::inRandomOrder()->first()->id ?? 1,
               'waktu' => $faker->dateTimeBetween('-1 years', '+1 years'),
               'judul' => $faker->sentence(3),
               'deskripsi' => $faker->paragraph(1),
               'jumlah_dana_hibah' => $faker->numberBetween(1000000, 900000000),
                'status_pengajuan' => $faker->boolean(),
                'status_pencairan' => $faker->boolean(),
                'rekomendasi' => $faker->paragraph(1),
                'disposisi_walikota' => $faker->boolean(),
                'disposisi_sekda' => $faker->boolean(),
                'disposisi_assisten' => $faker->boolean(),
                'disposisi_kabag' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
