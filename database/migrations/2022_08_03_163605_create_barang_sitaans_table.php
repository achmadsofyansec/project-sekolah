<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangSitaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_sitaans', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa');
            $table->string('id_kelas');
            $table->string('keterangan_sita');
            $table->string('tanggal_sita');
            $table->string('tahun_ajaran');
            $table->string('created_by');
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
        Schema::dropIfExists('barang_sitaans');
    }
}
