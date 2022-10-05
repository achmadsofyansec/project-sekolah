<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganTabunganSiswaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_tabungan_siswa_details')){
            Schema::create('keuangan_tabungan_siswa_details', function (Blueprint $table) {
                $table->id();
                $table->string('kode_detail');
                $table->string('kode_tabungan');
                $table->string('nominal_detail');
                $table->string('saldo_awal_detail');
                $table->string('saldo_akhir_detail');
                $table->string('type_detail');
                $table->text('keterangan_detail');
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
        Schema::dropIfExists('keuangan_tabungan_siswa_details');
    }
}
