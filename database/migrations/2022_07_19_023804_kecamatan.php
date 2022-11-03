<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('kecamatan')){
            Schema::create('kecamatan', function (Blueprint $table) {
                $table->id();
                $table->string('kode_kecamatan');
                $table->string('nama_kecamatan');
                $table->string('ket_kecamatan');
                $table->timestamps();
            });
        }
       
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatan');
        //
    }
}
