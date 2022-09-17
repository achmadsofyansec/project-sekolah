<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pos_pengeluarans')){
            Schema::create('pos_pengeluarans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_pos');
                $table->string('nama_pos');
                $table->string('desc_pos');
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
        Schema::dropIfExists('pos_pengeluarans');
    }
}
