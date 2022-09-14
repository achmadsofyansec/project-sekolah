<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganTabunganSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_tabungan_siswas', function (Blueprint $table) {
            $table->id();
            $table->string("kode_tabungan");
            $table->string("tgl_transaksi");
            $table->string("methode_bayar");
            $table->string("petugas_input");
            $table->string("keterangan");
            $table->string("type_trx");
            $table->string("jml_trx");
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
        Schema::dropIfExists('keuangan_tabungan_siswas');
    }
}
