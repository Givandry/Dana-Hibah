<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\PersyaratanProposal;

class PersyaratanProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        foreach (range (1, 10)as $index) {
            DB::table('persyaratan_proposal')->insert([
                'persyaratan' => $faker->sentence(3), // Judul dokumen
                'active' => $faker->boolean(), // Status aktif
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
