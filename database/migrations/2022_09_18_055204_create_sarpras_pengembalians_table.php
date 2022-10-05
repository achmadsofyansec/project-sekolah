<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasPengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarpras_pengembalians', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('penerima');
            $table->date('tgl_kembali');
            $table->string('desc_kembali');
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
        Schema::dropIfExists('sarpras_pengembalians');
    }
}
