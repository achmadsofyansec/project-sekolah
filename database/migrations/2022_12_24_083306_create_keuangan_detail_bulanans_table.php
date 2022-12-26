<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganDetailBulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_detail_bulanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bulanan');
            $table->string('tgl_input_detail');
            $table->string('jenis_pembayaran_detail');
            $table->string('nominal_detail');
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
        Schema::dropIfExists('keuangan_detail_bulanans');
    }
}
