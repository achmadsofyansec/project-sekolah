<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikPindahKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('akademik_pindah_kelas')){
            Schema::create('akademik_pindah_kelas', function (Blueprint $table) {
                $table->id();
                $table->string('tgl_pengajuan');
                $table->string('tgl_disetujui');
                $table->string('kode_siswa');
                $table->string('kode_kelas_siswa');
                $table->string('kode_kelas_tujuan');
                $table->string('status_pindah');
                $table->text('ket_pindah');
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
        Schema::dropIfExists('akademik_pindah_kelas');
    }
}
