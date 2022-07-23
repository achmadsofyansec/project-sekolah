<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_gurus', function (Blueprint $table) {
            $table->id();
            $table->integer('niptk');
            $table->integer('nuptk');
            $table->integer('nik');
            $table->string('nama');
            $table->string('jns_kelamin');
            $table->string('tgl_lhr');
            $table->string('tmp_lahir');
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->integer('no_hp');
            $table->integer('no_telp');
            $table->string('email')->unique();
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('jabatan');
            $table->string('foto_guru');
            $table->string('status');
            $table->string('jenis_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_gurus');
    }
}
