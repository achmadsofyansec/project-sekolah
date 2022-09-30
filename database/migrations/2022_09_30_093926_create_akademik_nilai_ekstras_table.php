<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikNilaiEkstrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('akademik_nilai_ekstras')) {
            Schema::create('akademik_nilai_ekstras', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('kode_ekstra');
                $table->string('kode_kelas');
                $table->string('nilai');
                $table->string('kegiatan');
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
        Schema::dropIfExists('akademik_nilai_ekstras');
    }
}
