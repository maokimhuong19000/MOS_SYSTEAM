<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manufacture_name');
            $table->integer('manufacture_country_id');//forence key
            $table->string('import_port');
            $table->date('import_date')->nullable();
            $table->integer('manufacture_option');
            $table->string('manufacture_option_description');
            $table->integer('aircon_service_option');
            $table->string('aircon_service_option_description');
            $table->integer('other_option');
            $table->string('other_option_description');
            $table->decimal('self_usage_percent');
            $table->decimal('other_usage_percent');
            $table->string('other_info');
            $table->string('quality');
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
        Schema::dropIfExists('materialrequests');
    }
}
