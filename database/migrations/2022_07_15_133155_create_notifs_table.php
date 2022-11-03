<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('notifs')){
            Schema::create('notifs', function (Blueprint $table) {
                $table->id();
                $table->string('nama_pengumuman');
                $table->string('isi_pengumuman');
                $table->string('file_pengumuman');
                $table->string('status_pengumuman');
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
        Schema::dropIfExists('notifs');
    }
}
