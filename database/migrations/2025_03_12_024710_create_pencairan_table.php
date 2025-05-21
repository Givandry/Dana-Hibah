<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencairanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pencairan', function (Blueprint $table) {
            $table->string('nomor_pengajuan');
            $table->text('catatan');
            $table->datetime('waktu');
            $table->integer('dana_hibah_disetujui');
            $table->boolean('disposisi_walikota', ['1', '0'])->default(1);
            $table->boolean('disposisi_sekda', ['1', '0'])->default(1);
            $table->boolean('disposisi_assisten', ['1', '0'])->default(1);
            $table->boolean('disposisi_kabag', ['1', '0'])->default(1);
            $table->text('sk_penetapan_walikota');
            $table->text('nphd');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('nomor_pengajuan')->references('nomor_pengajuan')->on('pengajuan_proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencairan');
    }
};
