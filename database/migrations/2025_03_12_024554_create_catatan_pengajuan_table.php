<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('catatan_pengajuan', function (Blueprint $table) {
            $table->string('nomor_pengajuan');
            $table->text('catatan');
            $table->datetime('waktu');
            $table->timestamps();

            $table->foreign('nomor_pengajuan')->references('nomor_pengajuan')->on('pengajuan_proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('catatan_pengajuan');
    }
};
