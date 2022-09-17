<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganPengeluaranDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_pengeluaran_details')){
            Schema::create('keuangan_pengeluaran_details', function (Blueprint $table) {
                $table->id();
                $table->string("kode_pengeluaran");
                $table->string("pos_sumber");
                $table->string("pos_keluar");
                $table->string("detail_keterangan");
                $table->string("detail_jumlah");
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
        Schema::dropIfExists('keuangan_pengeluaran_details');
    }
}
