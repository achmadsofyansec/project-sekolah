<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('akademik_nilais')){
            Schema::create('akademik_nilais', function (Blueprint $table) {
                $table->id();
                $table->string('kode_nilai');
                $table->string('tgl_input');
                $table->string('kode_kelas');
                $table->string('kode_jurusan');
                $table->string('kode_tahun_ajaran');
                $table->string('type_nilai');
                $table->string('kode_mapel');
                $table->string('kode_kategori');
                $table->string('status_input');
                $table->text('desc_input');
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
        Schema::dropIfExists('akademik_nilais');
    }
}
