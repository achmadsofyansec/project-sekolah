<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasSaranaBelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('sarpras_lapangans')) {
            Schema::create('sarpras_lapangans', function (Blueprint $table) {
                $table->id();
                $table->string('sarana_pembelajaran');
                $table->text('deskripsi');
                $table->string('fungsi');
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
        Schema::dropIfExists('sarpras_sarana_belajars');
    }
}
