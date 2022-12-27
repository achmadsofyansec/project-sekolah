<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukuDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('perpustakaan_peminjaman_buku_dts')){
            Schema::create('perpustakaan_peminjaman_buku_dts', function (Blueprint $table) {
                $table->id();
                $table->string('id_siswa');
                $table->string('kode_buku');
                $table->string('jumlah');
                $table->string('status');
                $table->string('desc_pinjam');
                $table->string('kondisi');
                $table->date('tanggal_pinjam');
                $table->date('tanggal_kembali');
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
        Schema::dropIfExists('perpustakaan_peminjaman_buku_dts');
    }
}
