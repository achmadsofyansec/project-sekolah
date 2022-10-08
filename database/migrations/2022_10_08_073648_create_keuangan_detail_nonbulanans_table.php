<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganDetailNonbulanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_detail_nonbulanans')){
            Schema::create('keuangan_detail_nonbulanans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_non_bulanan');
                $table->string('tgl_input_detail');
                $table->string('jenis_pembayaran_detail');
                $table->string('nominal_detail');
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
        Schema::dropIfExists('keuangan_detail_nonbulanans');
    }
}
