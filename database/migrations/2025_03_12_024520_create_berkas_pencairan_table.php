<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasPencairanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berkas_pencairan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengajuan');
            $table->unsignedBigInteger('persyaratan_proposal_id');
            $table->string('file');
            $table->boolean('check', ['0', '1']);
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('nomor_pengajuan')->references('nomor_pengajuan')->on('pengajuan_proposal')->onDelete('cascade');
            $table->foreign('persyaratan_proposal_id')->references('id')->on('persyaratan_proposal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('berkas_pencairan');
    }
};
