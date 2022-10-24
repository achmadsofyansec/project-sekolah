<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpustakaanDataBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if (Schema::hasTable('perpustakaan_data_bukus')) {
        Schema::create('perpustakaan_data_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->integer('tahun_terbit');
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
            $table->string('id_sumber');
            $table->string('id_kategori');
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
        Schema::dropIfExists('perpustakaan_data_bukus');
    }
}
