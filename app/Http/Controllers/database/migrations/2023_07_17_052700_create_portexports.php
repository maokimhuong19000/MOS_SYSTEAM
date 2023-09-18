<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortexports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portexports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer("country_id");
            $table->string("port_code",50);
            $table->string("port_type",50);
            $table->string("port_name",150);
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
        Schema::dropIfExists('portexports');
    }
}
