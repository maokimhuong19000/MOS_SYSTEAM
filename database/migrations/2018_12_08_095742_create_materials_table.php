<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('com_name', 200); 
            $table->string('chemical', 250);
            $table->string('substance', 250);
            $table->string('code', 100);
            $table->string('taxcode', 100);
            $table->string('type', 100);
            $table->smallInteger('status');
            $table->timestamps();
            $table->index(['id']);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materials');
    }
}
