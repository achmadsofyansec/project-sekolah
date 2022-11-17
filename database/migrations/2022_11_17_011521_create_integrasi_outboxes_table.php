<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrasiOutboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('integrasi_outboxes')){
            Schema::create('integrasi_outboxes', function (Blueprint $table) {
                $table->id();
                $table->string('nomor_tujuan');
                $table->string('type');
                $table->text('pesan');
                $table->string('status');
                $table->string('app_id');
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
        Schema::dropIfExists('integrasi_outboxes');
    }
}
