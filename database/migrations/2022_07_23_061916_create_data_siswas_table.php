<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('data_siswas')){
            Schema::create('data_siswas', function (Blueprint $table) {
                $table->id();
                $table->string('nik');
                $table->string('nama');
                $table->string('nisn');
                $table->string('kip');
                $table->string('tmp_lahir');
                $table->string('tgl_lhr');
                $table->string('jns_kelamin');
                $table->string('agama');
                $table->integer('anak');
                $table->integer('jml_saudara');
                $table->string('hobi');
                $table->string('cita_cita');
                $table->string('no_hp');
                $table->string('email');
                $table->string('biaya_sekolah');
                $table->string('kebutuhan_disabilitas');
                $table->string('kebutuhan_khusus');
                $table->text('alamat');
                $table->string('tmp_tinggal');
                $table->string('jarak_tinggal');
                $table->string('waktu_tempuh');
                $table->string('antar_jemput');
                $table->string('foto_siswa');
                $table->string('status_siswa');
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
        Schema::dropIfExists('data_siswas');
    }
}
