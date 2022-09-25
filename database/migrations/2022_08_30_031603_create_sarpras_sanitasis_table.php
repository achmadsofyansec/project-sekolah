<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasSanitasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_sanitasis', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_air_bersih');
            $table->string('sumber_air_minum');
            $table->string('kecukupan_air_bersih');
            $table->string('fasilitas_jamban_khusus');
            $table->string('tipe_toilet');
            $table->string('pembalut_cadangan');
            $table->integer('cuci_tangan');
            // $table->integer('jumlah_cuci_tangan');
            $table->integer('jumlah_cuci_tangan_kb');
            $table->integer('jumlah_cuci_tangan_kr');
            $table->string('jumlah_sabun_cuci_tangan');
            $table->string('pembuangan_limbah');
            $table->string('waktu_pembuagan_limbah');
            $table->string('selokan_air');
            $table->string('tempat_sampah_kelas');
            $table->string('tempat_sampah_tertutup');            
            $table->string('cermin');
            $table->string('tps');
            $table->string('pengangkatan_sampah');          
            $table->string('anggaran_pemeliharaan');
            $table->string('kegiatan_rutin');
            $table->string('kemitraan_sekolah');
            $table->string('pemisahan_jamban');
            $table->integer('jumlah_jamban_baik_lk');
            $table->integer('jumlah_jamban_baik_pr');
            $table->integer('jumlah_jamban_baik_br');
            $table->integer('jumlah_jamban_rusak_lk');
            $table->integer('jumlah_jamban_rusak_pr');
            $table->integer('jumlah_jamban_rusak_br');
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
        Schema::dropIfExists('sarpras_sanitasis');
    }
}
