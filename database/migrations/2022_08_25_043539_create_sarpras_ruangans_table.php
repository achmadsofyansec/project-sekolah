<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_ruangans')) {
            Schema::create('sarpras_ruangans', function (Blueprint $table) {
                $table->id();
                $table->string('nama_gedung');
                $table->string('jenis_ruangan');
                $table->string('nama');
                $table->string('kondisi');
                $table->integer('tahun_dibangun');
                $table->integer('panjang');
                $table->integer('lebar');
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
        Schema::dropIfExists('sarpras_ruangans');
    }
}
