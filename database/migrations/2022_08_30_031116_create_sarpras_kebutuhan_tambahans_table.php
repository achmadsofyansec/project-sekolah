<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasKebutuhanTambahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_kebutuhan_tambahans', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_pengajuan');
            $table->string('jenis');
            $table->integer('jumlah');
            $table->string('sifat');
            $table->string('rangking');
            $table->string('kategori_kondisi');
            $table->string('foto');
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
        Schema::dropIfExists('sarpras_kebutuhan_tambahans');
    }
}
        