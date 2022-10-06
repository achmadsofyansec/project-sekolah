<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganPembayaranNonbulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_pembayaran_nonbulanans')){
            Schema::create('keuangan_pembayaran_nonbulanans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('kode_kelas');
                $table->string('kode_jenis_pembayaran')->nullable();
                $table->string('kode_biaya_siswa');
                $table->string('tagihan_pembayaran');
                $table->string('nominal_pembayaran');
                $table->string('tgl_bayar');
                $table->string('status_pembayaran');
                $table->string('ket_pembayaran')->nullable();
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
        Schema::dropIfExists('keuangan_pembayaran_nonbulanans');
    }
}
