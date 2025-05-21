<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanProposalTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan_proposal', function (Blueprint $table) {
            $table->string('nomor_pengajuan')->primary(); 
            $table->unsignedBigInteger('rumah_ibadah_id');
            $table->datetime('waktu');
            $table->text('judul');
            $table->text('deskripsi');
            $table->integer('jumlah_dana_hibah');
            $table->boolean('status_pengajuan', ['0', '1']);
            $table->boolean('status_pencairan', ['0', '1'])->default('0');
            $table->string('rekomendasi', 255)->nullable();
            $table->boolean('disposisi_walikota', ['0', '1'])->default('0');
            $table->boolean('disposisi_sekda', ['0', '1'])->default('0');
            $table->boolean('disposisi_assisten', ['0', '1'])->default('0');
            $table->boolean('disposisi_kabag', ['0', '1'])->default('0');
            $table->timestamps();

             // Add foreign key constraint
             $table->foreign('rumah_ibadah_id')->references('id')->on('rumah_ibadah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_proposal');
    }
};
