<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->string('alamat');
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('no_hp', 20)->nullable();
            $table->string('email', 50)->unique();
            $table->string('jabatan', 50);
            $table->unsignedBigInteger('rumah_ibadah_id');
            $table->string('password');
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
        Schema::dropIfExists('pengurus');
    }
};
