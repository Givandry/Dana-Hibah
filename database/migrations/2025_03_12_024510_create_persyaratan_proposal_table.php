<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersyaratanProposalTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('persyaratan_proposal', function (Blueprint $table) {
            $table->id();
            $table->text('persyaratan');
            $table->boolean('active', ['0', '1']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('persyaratan_proposal');
    }
};
