<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('absensis')){
            Schema::create('absensis', function (Blueprint $table) {
                $table->id();
                $table->dateTime('tgl_absensi');
                $table->string('kode_siswa');
                $table->string('jenis_absen');
                $table->string('keterangan');
                $table->string('alasan');
                $table->string('created_by');
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
        Schema::dropIfExists('absensis');
    }
}
