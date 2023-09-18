<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToMaterialRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('materialrequests', function (Blueprint $table) {

            $table->string('manufacture_name',200)->nullable()->change();
            $table->Integer('manufacture_country_id')->change();
            $table->string('import_port' ,200)->nullable()->change();
           // $table->string('import_date' ,200)->nullable()->change();
            $table->smallInteger('manufacture_option')->change();
            $table->string('manufacture_option_description',200)->nullable()->change();
            $table->smallInteger('aircon_service_option')->change();
            $table->string('aircon_service_option_description',200)->nullable()->change();
            $table->smallInteger('other_option')->change();
            $table->string('other_option_description' ,200)->nullable()->change();
            $table->decimal('self_usage_percent', 3, 2)->change();
            $table->decimal('other_usage_percent', 3, 2)->change();
            $table->string('other_info',200)->nullable()->change();
            $table->string('quality',100)->nullable()->change();
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
