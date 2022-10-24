<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('perpustakaan_sumbers')){
            Schema::create('perpustakaan_sumbers', function (Blueprint $table) {
                $table->id();
                $table->string('nama_sumber');
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
        Schema::dropIfExists('perpustakaan_sumbers');
    }
}
