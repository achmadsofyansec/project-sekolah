<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('prestasis')){
            Schema::create('prestasis', function (Blueprint $table) {
                $table->id();
                $table->string('tahun_prestasi');
                $table->string('nama_lomba');
                $table->string('bidang_lomba');
                $table->string('penyelenggara');
                $table->string('tingkat_lomba');
                $table->string('peringkat_diraih');
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
        Schema::dropIfExists('prestasis');
    }
}
