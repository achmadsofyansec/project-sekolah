<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganTabunganSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('keuangan_tabungan_siswas')){
            Schema::create('keuangan_tabungan_siswas', function (Blueprint $table) {
                $table->id();
                $table->string("kode_tabungan");
                $table->string("kode_siswa");
                $table->string('saldo_tabungan');
                $table->string('status_tabungan');
                $table->string('desc_tabungan');
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
        Schema::dropIfExists('keuangan_tabungan_siswas');
    }
}
