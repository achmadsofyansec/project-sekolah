<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkademikNilaiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('akademik_nilai_details')){
            Schema::create('akademik_nilai_details', function (Blueprint $table) {
                $table->id();
                $table->string('kode_siswa');
                $table->string('kode_nilai');
                $table->string('nilai');
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
        Schema::dropIfExists('akademik_nilai_details');
    }
}
