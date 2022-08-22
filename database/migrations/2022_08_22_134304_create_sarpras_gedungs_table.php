<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasGedungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_gedungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_gedung');
            $table->string('nama_lahan');
            $table->integer('jml_lantai');
            $table->string('kepemilikan');
            $table->string('kondisi_kerusakan');
            $table->string('kategori_kondisi');
            $table->integer('tahun_dibangun');
            $table->integer('luas_gedung');
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
        Schema::dropIfExists('sarpras_gedungs');
    }
}
