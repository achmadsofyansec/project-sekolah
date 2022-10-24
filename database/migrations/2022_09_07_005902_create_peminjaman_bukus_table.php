<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('perpustakaan_peminjaman_bukus')){
            Schema::create('perpustakaan_peminjaman_bukus', function (Blueprint $table) {
                $table->id();
                $table->string('id_siswa');
                $table->string('tanggungan');
                $table->text('desc_pinjam');
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
        Schema::dropIfExists('perpustakaan_peminjaman_bukus');
    }
}
