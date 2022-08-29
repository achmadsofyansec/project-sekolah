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
        Schema::create('peminjaman_buku_dts', function (Blueprint $table) {
            $table->id();
            $table->string('id_peminjaman_dt');
            $table->string('id_peminjaman');
            $table->string('id_buku');
            $table->integer('jumlah');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->integer('durasi');
            $table->date('tanggal_kembali_asli');
            $table->integer('telat');
            $table->float('denda');
            $table->char('status_input_dt');
            $table->char('status_pinjam_dt');
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
        Schema::dropIfExists('peminjaman_buku_dts');
    }
}
