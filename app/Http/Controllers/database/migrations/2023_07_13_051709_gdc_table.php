<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('gdcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("access_token",250);
            $table->string("token_type",100);
            $table->string("refresh_token",250);
            $table->Integer("expires_in");
            $table->string("scope" ,100);
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
        //
    }
}
