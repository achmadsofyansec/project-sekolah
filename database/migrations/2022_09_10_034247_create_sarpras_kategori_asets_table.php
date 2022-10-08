<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasKategoriAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_kategori_asets')) {
            Schema::create('sarpras_kategori_asets', function (Blueprint $table) {
                $table->id();
                $table->string('kategori');
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
        Schema::dropIfExists('sarpras_kategori_asets');
    }
}
