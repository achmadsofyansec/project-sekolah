<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sekolahs')){
            Schema::create('sekolahs', function (Blueprint $table) {
                $table->id();
                $table->string('kode_sekolah');
                $table->string('nsm');
                $table->string('npsn');
                $table->string('akreditasi');
                $table->string('nama_sekolah');
                $table->string('alamat_sekolah');
                $table->string('longtitude');
                $table->string('latitude');
                $table->string('kode_kecamatan');
                $table->string('kode_kelurahan');
                $table->string('kode_pos');
                $table->string('nomor_hp');
                $table->string('email');
                $table->string('website');
                $table->string('logo_sekolah');
                $table->timestamps();
            });
        }
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sekolahs');
    }
}
