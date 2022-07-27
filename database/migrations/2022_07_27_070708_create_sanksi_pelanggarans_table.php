<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanksiPelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanksi_pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sanksi');
            $table->integer('dari_poin');
            $table->integer('sampai_poin');
            $table->string('sanksi');
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
        Schema::dropIfExists('sanksi_pelanggarans');
    }
}
