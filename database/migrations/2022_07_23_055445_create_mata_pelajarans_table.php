<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('mata_pelajarans')){
            Schema::create('mata_pelajarans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_kelompok');
                $table->string('kode_mapel');
                $table->string('nama_mapel');
                $table->string('status_mapel');
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
        Schema::dropIfExists('mata_pelajarans');
    }
}
