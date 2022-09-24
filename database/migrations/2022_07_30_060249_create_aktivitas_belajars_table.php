<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasBelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('aktivitas_belajars')){
            Schema::create('aktivitas_belajars', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('kode_kelas');
                $table->string('kode_tahun_ajaran');
                $table->string('kode_jurusan');
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
        Schema::dropIfExists('aktivitas_belajars');
    }
}
