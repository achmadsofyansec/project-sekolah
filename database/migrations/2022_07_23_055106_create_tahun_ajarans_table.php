<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunAjaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tahun_ajarans')){
            Schema::create('tahun_ajarans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_tahun_ajaran');
                $table->string('tahun_ajaran');
                $table->integer('semester');
                $table->string('status_tahun_ajaran');
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
        Schema::dropIfExists('tahun_ajarans');
    }
}
