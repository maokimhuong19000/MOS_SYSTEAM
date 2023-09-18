<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('customers', function (Blueprint $table) {
            $table->string('tel');
            $table->string('fax',200)->nullable();
            $table->string('email' ,200)->nullable();
            $table->string('city' ,200)->nullable();
            $table->string('district' ,200)->nullable();
            $table->string('commune',200)->nullable();
            $table->string('village',200)->nullable();
            $table->string('street',200)->nullable();
            $table->string('house',200)->nullable();
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
