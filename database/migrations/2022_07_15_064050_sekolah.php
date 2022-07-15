<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sekolah');
            $table->string('nsm');
            $table->string('npsn');
            $table->string('akreditasi');
            $table->string('nama_sekolah');
            $table->string('jenjang');
            $table->string('alamat');
            $table->string('website');
            $table->string('email')->unique();
            $table->string('kode_pos');
            $table->string('nomor_hp');
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
        Schema::dropIfExists('sekolah');
        //
    }
}
