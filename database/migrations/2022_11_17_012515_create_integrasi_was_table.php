<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrasiWasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('integrasi_was')){
            Schema::create('integrasi_was', function (Blueprint $table) {
                $table->id();
                $table->string('wa_name');
                $table->string('wa_desc');
                $table->string('wa_number');
                $table->string('wa_multidevices');
                $table->string('wa_status');
                $table->string('wa_endpoint')->default('http://127.0.0.1:8000');
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
        Schema::dropIfExists('integrasi_was');
    }
}
