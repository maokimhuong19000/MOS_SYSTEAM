<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEquipmentEquipmentrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipmentrequests', function (Blueprint $table) {
            $table->string('manufacture_name',200)->nullable();
            $table->integer('country_id');
            $table->string('import_port',200)->nullable();
            $table->dateTime('import_date');
            $table->string('other_info',200)->nullable();
            $table->string('place_import',200)->nullable();
            $table->string('place_export',200)->nullable();
            $table->string('address',200)->nullable();
            $table->integer('customer_id');
            $table->string('import_status',200)->nullable();
            $table->string('file_import_department',200)->nullable();
            $table->string('file_shipping',200)->nullable();
            $table->string('file_custom_declareation',200)->nullable();
            $table->string('file_invoice',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipmentrequests', function (Blueprint $table) {
            //
        });
    }
}
