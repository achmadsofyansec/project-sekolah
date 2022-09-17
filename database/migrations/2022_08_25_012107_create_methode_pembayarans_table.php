<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMethodePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('methode_pembayarans')){
            Schema::create('methode_pembayarans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_methode');
                $table->string('nama_methode');
                $table->string('desc_methode');
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
        Schema::dropIfExists('methode_pembayarans');
    }
}
