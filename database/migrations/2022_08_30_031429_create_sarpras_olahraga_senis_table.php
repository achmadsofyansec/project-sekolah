<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasOlahragaSenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_olahraga_senis')) {
            Schema::create('sarpras_olahraga_senis', function (Blueprint $table) {
                $table->id();
                $table->string('unit');
                $table->integer('jml_baik');
                $table->integer('jml_rusak_ringan');
                $table->integer('jml_rusak_berat');
                $table->string('foto');
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
        Schema::dropIfExists('sarpras_olahraga_senis');
    }
}
