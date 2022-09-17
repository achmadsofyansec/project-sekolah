<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganPenerimaanLainDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_penerimaan_lain_details')){
            Schema::create('keuangan_penerimaan_lain_details', function (Blueprint $table) {
                $table->id();
                $table->string("kode_penerimaan");
                $table->string("pos_terima");
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
        Schema::dropIfExists('keuangan_penerimaan_lain_details');
    }
}
