<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasKepemilikanLahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_kepemilikan_lahans')) {
            Schema::create('sarpras_kepemilikan_lahans', function (Blueprint $table) {
                $table->id();
                $table->string('nama_lahan');
                $table->string('kepemilikan');
                $table->string('bersertifikat');
                $table->integer('belum_bersertifikat');
                $table->integer('total');
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
        Schema::dropIfExists('sarpras_kepemilikan_lahans');
    }
}
