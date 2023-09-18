<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEquipmentEquipmentrequestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipmentrequestdetails', function (Blueprint $table) {
            $table->integer('equipmentrequest_id');
            $table->integer('equipment_id');
            $table->integer('amount');
            $table->string('description',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipmentrequestdetails', function (Blueprint $table) {
           //
        });
    }
}
