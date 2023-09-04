<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ifees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('feetype', 100); 
            $table->decimal('fee', 16, 2);
            $table->decimal('from', 8, 2);
            $table->decimal('to', 16, 2);
            $table->smallInteger('status');
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
        Schema::dropIfExists('ifees');
    }
}
