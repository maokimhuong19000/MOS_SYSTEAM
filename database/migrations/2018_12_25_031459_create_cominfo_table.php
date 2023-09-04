<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCominfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cominfos', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('customer_id');
            $table->string('tel');
            $table->string('fax',200)->nullable();
            $table->string('email' ,200)->nullable();
            $table->string('city' ,200)->nullable();
            $table->string('district' ,200)->nullable();
            $table->string('commune',200)->nullable();
            $table->string('village',200)->nullable();
            $table->string('street',200)->nullable();
            $table->string('house',200)->nullable();
            $table->string('contact_person',200);
            $table->string('position',200);
            $table->string('gender',100)->nullable();
            $table->string('nationality',200);
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
        Schema::dropIfExists('cominfos');
    }
}
