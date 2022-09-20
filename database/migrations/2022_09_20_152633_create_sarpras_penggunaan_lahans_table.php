<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasPenggunaanLahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_penggunaan_lahans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lahan');
            $table->string('status');
            $table->string('penggunaan');
            $table->string('penggunaan_bersertifikat');
            $table->string('penggunaan_belum_bersertifikat');
            $table->string('penggunaan_total');
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
        Schema::dropIfExists('sarpras_penggunaan_lahans');
    }
}
