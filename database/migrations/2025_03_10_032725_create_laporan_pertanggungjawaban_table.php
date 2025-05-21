<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPertanggungjawabanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
            Schema::create('laporan_pertanggungjawaban', function (Blueprint $table) {
                $table->string('nomor_pengajuan');
                $table->datetime('waktu');
                $table->text('file');
                $table->boolean('check', ['0', '1'])->default('0');
                $table->text('catatan');
                $table->timestamps();
                
                // Add foreign key constraint
                $table->foreign('nomor_pengajuan')->references('nomor_pengajuan')->on('pengajuan_proposal')->onDelete('cascade');
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('laporan_pertanggungjawaban');
    }
};
