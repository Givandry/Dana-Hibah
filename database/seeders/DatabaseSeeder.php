<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\JenisSeeder;
use Database\Seeders\RegulasiSeeder;
use Database\Seeders\RumahIbadahSeeder;
use Database\Seeders\PengurusSeeder;
use Database\Seeders\PengajuanProposalSeeder;
use Database\Seeders\PersyaratanProposalSeeder;
use Database\Seeders\BerkasPengajuanProposalSeeder;
use Database\Seeders\BerkasPencairanProposalSeeder;
use Database\Seeders\CatatanPengajuanProposalSeeder;
use Database\Seeders\LaporanPertanggungjawabanSeeder; 
use Database\Seeders\PencairanSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            JenisSeeder::class,
            RegulasiSeeder::class,
            RumahIbadahSeeder::class,
            PengurusSeeder::class,
            PengajuanProposalSeeder::class,
            LaporanPertanggungjawabanSeeder::class,
            PersyaratanProposalSeeder::class,
            BerkasPengajuanSeeder::class,
            BerkasPencairanSeeder::class,
            CatatanPengajuanSeeder::class,
            PencairanSeeder::class,
            
        ]);
    }
}