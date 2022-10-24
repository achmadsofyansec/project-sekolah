<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelulusanNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('kelulusan_nilais')) {
            Schema::create('kelulusan_nilais', function (Blueprint $table) {
                $table->id();
                $table->integer('kode_siswa');
                $table->string('kode_unjian');
                $table->integer('bind');
                $table->integer('bing');
                $table->integer('mat');
                $table->integer('kejurusan');
                $table->integer('status');
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
        Schema::dropIfExists('kelulusan_nilais');
    }
}
