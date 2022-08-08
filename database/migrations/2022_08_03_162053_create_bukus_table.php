<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_buku');
            $table->string('kode_buku');
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->char('tahun_terbit');
            $table->string('tempat_terbit');
            $table->integer('total_halaman');
            $table->float('tinggi_buku');
            $table->string('ddc');
            $table->string('isbn');
            $table->integer('jumlah_buku');
            $table->date('tanggal_masuk');
            $table->string('no_inventaris');
            $table->string('lokasi');
            $table->text('deskripsi_buku');
            $table->string('foto_buku');
            $table->integer('id_sumber');
            $table->integer('id_kategori');
            $table->integer('stok');
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
        //
    }
}
