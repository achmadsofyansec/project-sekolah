<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasDataAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_data_asets', function (Blueprint $table) {
            $table->id();
            $table->string('unit');
            $table->string('kategori');
            $table->integer('jml_baik');
            $table->integer('jml_rusak_ringan');
            $table->integer('jml_rusak_berat');
            $table->string('foto');
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
        Schema::dropIfExists('sarpras_data_asets');
    }
}