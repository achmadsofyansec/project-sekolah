<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOrtusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ortus', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_ortu');
            $table->string('tmp_lahir_ortu');
            $table->string('tgl_lhr_ortu');
            $table->string('status_ortu');
            $table->string('pendidikan_terakhir_ortu');
            $table->string('pekerjaan_terakhir_ortu');
            $table->string('domisili_ortu');
            $table->string('no_tlp_ortu');
            $table->string('penghasilan_ortu');
            $table->text('alamat_ortu');
            $table->string('tmp_tinggal_ortu');
            $table->string('jns_ortu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_ortus');
    }
}
