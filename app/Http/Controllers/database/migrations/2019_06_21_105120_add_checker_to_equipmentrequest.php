<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckerToEquipmentrequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('equipmentrequests', function (Blueprint $table) {
             $table->Integer('checker'); // id of user
            $table->Integer('verifier'); // id of user
            $table->smallInteger('manufacture_option');
             $table->smallInteger('aircon_service_option');
             $table->smallInteger('other_option');
            $table->string('other_option_description' ,200)->nullable();

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
