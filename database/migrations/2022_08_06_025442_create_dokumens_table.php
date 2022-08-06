<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('ruangan');
            $table->string('lemari');
            $table->string('rak');
            $table->string('box');
            $table->string('map');
            $table->string('urut');
            $table->dateTime('tanggal_dokumen');
            $table->string('jenis_dokumen');
            $table->integer('nomor_dokumen');
            $table->string('nama_dokumen');
            $table->text('deskripsi');
            $table->string('file');
            $table->date('tahun_ajaran');
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
        Schema::dropIfExists('dokumens');
    }
}
