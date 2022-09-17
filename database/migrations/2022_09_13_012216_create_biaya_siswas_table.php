<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('biaya_siswas')){
            Schema::create('biaya_siswas', function (Blueprint $table) {
                $table->id();
                $table->string("nama_biaya");
                $table->string("pos_biaya");
                $table->string("tipe_biaya");
                $table->string("kartu_spp");
                $table->string("penunggakan");
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
        Schema::dropIfExists('biaya_siswas');
    }
}
