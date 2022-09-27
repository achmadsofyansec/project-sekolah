<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasLahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_lahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lahan');
            $table->text('alamat');
            $table->integer('luas');
            $table->integer('luas_digunakan');
            $table->string('status_lahan');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->integer('kode_pos');
            $table->string('kategori_geografis');
            $table->string('wilayah');
            $table->integer('jarak_provinsi');
            $table->integer('jarak_kabupaten');
            $table->integer('jarak_kecamatan');
            $table->integer('jarak_kemenag');
            $table->integer('jarak_ra');
            $table->integer('jarak_mi');
            $table->integer('jarak_mts');
            $table->integer('jarak_sd');
            $table->integer('jarak_smp');
            $table->integer('jarak_sma');
            $table->integer('jarak_pontren');
            $table->integer('jarak_ptki');
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
        Schema::dropIfExists('sarpras_lahans');
    }
}
