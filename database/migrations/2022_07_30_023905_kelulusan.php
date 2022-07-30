<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kelulusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelulusan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('no_ujian');
            $table->integer('bind');
            $table->integer('mat');
            $table->integer('bing');
            $table->integer('kejuruhan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelulusan');
    }
}
