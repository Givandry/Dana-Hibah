<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulasiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
            Schema::create('regulasi', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('file');
                $table->boolean('aktif')->default(1);
                $table->timestamps();
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('regulasi');
    }
};
