<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkstrakulikulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakulikulers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ekstra');
            $table->string('nama_ekstra');
            $table->string('desc_ekstra');
            $table->string('status_ekstra');
            $table->string('wajib_ekstra');
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
        Schema::dropIfExists('ekstrakulikulers');
    }
}
