<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikNilaiPrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('akadmik_nilai_prestasis')){
            Schema::create('akademik_nilai_prestasis', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('nama_lomba');
                $table->string('nama_penyelenggara');
                $table->string('tahun_lomba');
                $table->string('tingkat_lomba');
                $table->string('peringkat_lomba');
                $table->string('keterangan_lomba');
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
        Schema::dropIfExists('akademik_nilai_prestasis');
    }
}
