<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('perpustakaan_kategoris')){
            Schema::create('perpustakaan_kategoris', function (Blueprint $table) {
                $table->id();
                $table->string('nama_kategori');
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
        Schema::dropIfExists('perpustakaan_kategoris');
    }
}
