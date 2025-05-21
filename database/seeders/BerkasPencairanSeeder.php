<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\BerkasPencairan;
use App\Models\PersyaratanProposal;
use App\Models\PengajuanProposal;

class BerkasPencairanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $persyaratanProposal = PersyaratanProposal::exists() ? PersyaratanProposal::all() : collect();
        $pengajuanProposal = PengajuanProposal::exists() ? PengajuanProposal::all() : collect();

        if ($persyaratanProposal->isEmpty() || $pengajuanProposal->isEmpty()) {
            return;
        }

        foreach ($pengajuanProposal as $pengajuanProposal) {
                BerkasPencairan::create([
                    'nomor_pengajuan' => $pengajuanProposal->nomor_pengajuan,
                    'persyaratan_proposal_id' => PersyaratanProposal::inRandomOrder()->first()->id ?? 1,
                    'file' => $faker->randomElement(['pdf', 'docx', 'xlsx', 'jpg', 'png']),
                    'check' => $faker->boolean(),  // Catatan berkas pencairan
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            
        }
    }
}