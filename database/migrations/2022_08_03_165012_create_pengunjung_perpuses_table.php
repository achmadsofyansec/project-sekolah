<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungPerpusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('perpustakaan_pengunjung_perpuses')){
            Schema::create('perpustakaan_pengunjung_perpuses', function (Blueprint $table) {
                $table->id();
                $table->string('nis');
                $table->string('kode_buku');
                $table->string('keperluan');
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
        Schema::dropIfExists('perpustakaan_pengunjung_perpuses');
    }
}
