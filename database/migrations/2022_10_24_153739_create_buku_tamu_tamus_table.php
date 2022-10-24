<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTamuTamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('buku_tamu_tamus')) {
            Schema::create('buku_tamu_tamus', function (Blueprint $table) {
                $table->id();
                $table->string('nama_tamu');
                $table->string('asal_tamu'); 
                $table->text('alamat_tamu');
                $table->string('keperluan');
                $table->string('no_telp');
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
        Schema::dropIfExists('buku_tamu_tamus');
    }
}
