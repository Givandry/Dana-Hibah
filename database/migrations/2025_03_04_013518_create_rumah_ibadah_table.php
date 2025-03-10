<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRumahIbadahTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasColumn('rumah_ibadah', 'nama_rumah_ibadah')) {
            Schema::create('rumah_ibadah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rumah_ibadah', 100);
            $table->string('alamat');
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('no_hp', 20)->nullable();
            $table->string('email', 50)->unique();
            $table->unsignedBigInteger('jenis_id');
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rumah_ibadah');
    }
}
