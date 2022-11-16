<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SekolahRevisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('sekolahs')){
            Schema::table('sekolahs', function (Blueprint $table) {
                $table->string('jenjang')->after('akreditasi')->nullable();
                $table->string('status')->after('alamat_sekolah')->nullable();
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
        if(Schema::hasTable('sekolahs')){
            Schema::table('sekolahs', function (Blueprint $table) {
                //
            });
        }
        
    }
}
