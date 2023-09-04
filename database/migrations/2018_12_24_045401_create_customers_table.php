<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name',200);
           // $password = Hash::make('secret');
          //  $table->string($password);
          //  $table->rememberToken();
            $table->string('password');
            $table->rememberToken();
            $table->string('idcard',200)->nullable();           
            $table->string('tin',200)->nullable();
            $table->dateTime('tin_date')->nullable();
            $table->string('company_id',200)->nullable();
            $table->dateTime('company_id_date')->nullable();
            $table->string('company_name',200)->nullable();
            $table->string('company_activity',200)->nullable();
             $table->smallInteger('status');
              $table->smallInteger('astatus');
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
        Schema::dropIfExists('customers');
    }
}
