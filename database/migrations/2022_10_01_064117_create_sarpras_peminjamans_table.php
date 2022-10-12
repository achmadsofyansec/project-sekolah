<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasPeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_peminjamans')) {
            Schema::create('sarpras_peminjamans', function (Blueprint $table) {
                $table->id();
                $table->string('kode_peminjaman');
                $table->string('kode_siswa');
                $table->string('tgl_peminjaman');  
                $table->string('tgl_pengembalian');
                $table->string('status_peminjaman');
                $table->string('penerima');
                $table->text('desc_peminjaman');
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
        Schema::dropIfExists('sarpras_peminjamans');
    }
}
