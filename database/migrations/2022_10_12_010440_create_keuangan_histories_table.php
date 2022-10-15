<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_histories')){
            Schema::create('keuangan_histories', function (Blueprint $table) {
                $table->id();
                $table->string('tgl_history');
                $table->string('histori_type_pembayaran');                
                $table->string('kode_biaya');
                $table->string('history_tagihan');
                $table->string('history_pembayaran');
                $table->string('kode_siswa');
                $table->text('ket_history');
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
        Schema::dropIfExists('keuangan_histories');
    }
}
