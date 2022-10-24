<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTamuAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('buku_tamu_agendas')) {
            Schema::create('buku_tamu_agendas', function (Blueprint $table) {
                $table->id();
                $table->string('nama_agenda');
                $table->string('desc_agenda');
                $table->string('tgl_mulai_agenda');
                $table->string('tgl_selesai_agenda');
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
        Schema::dropIfExists('buku_tamu_agendas');
    }
}
