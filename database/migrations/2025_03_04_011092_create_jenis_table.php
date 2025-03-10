<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
            Schema::create('jenis', function (Blueprint $table) {
                $table->id();
                $table->string('jenis_rumah_ibadah');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('jenis');
    }
}   