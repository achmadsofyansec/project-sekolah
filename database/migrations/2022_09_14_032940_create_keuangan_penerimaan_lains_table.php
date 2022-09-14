<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganPenerimaanLainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_penerimaan_lains', function (Blueprint $table) {
            $table->id();
            $table->string("tgl_penerimaan");
            $table->string("penerimaan_dari");
            $table->string("methode_bayar");
            $table->string("desc_penerimaan");
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
        Schema::dropIfExists('keuangan_penerimaan_lains');
    }
}
