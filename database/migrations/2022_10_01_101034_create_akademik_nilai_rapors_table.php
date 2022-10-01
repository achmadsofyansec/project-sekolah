<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikNilaiRaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('akademik_nilai_rapors')){
            Schema::create('akademik_nilai_rapors', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('kode_mapel');
                $table->string('kode_kelas');
                $table->string('kode_kategori_nilai');
                $table->string('kode_nilai');
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
        Schema::dropIfExists('akademik_nilai_rapors');
    }
}
