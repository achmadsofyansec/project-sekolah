<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaEkstrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('anggota_ekstras')){
            Schema::create('anggota_ekstras', function (Blueprint $table) {
                $table->id();
                $table->string('tanggal_daftar');
                $table->string('kode_siswa');
                $table->string('kode_ekstra');
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
        Schema::dropIfExists('anggota_ekstras');
    }
}
