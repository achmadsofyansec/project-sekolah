<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasDendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_dendas')) {
            Schema::create('sarpras_dendas', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('kode_denda');
                $table->string('unit');
                $table->string('pelanggaran');
                $table->string('total_denda');
                $table->string('status');
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
        Schema::dropIfExists('sarpras_dendas');
    }
}
