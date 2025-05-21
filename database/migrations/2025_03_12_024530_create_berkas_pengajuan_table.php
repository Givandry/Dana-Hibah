<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasPengajuanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berkas_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengajuan');
            $table->unsignedBigInteger('persyaratan_proposal_id');
            $table->text('nama_persyaratan');
            $table->text('file');
            $table->boolean('check', ['0', '1']);
            $table->timestamps();

             // Add foreign key constraint
            $table->foreign('nomor_pengajuan')->references('nomor_pengajuan')->on('pengajuan_proposal')->onDelete('cascade');
            // Add foreign key constraint
            $table->foreign('persyaratan_proposal_id')->references('id')->on('persyaratan_proposal')->onDelete('cascade');
         });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('berkas_pengajuan');
    }
};
