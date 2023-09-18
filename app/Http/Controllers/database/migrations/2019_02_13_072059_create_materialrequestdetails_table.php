<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialrequestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialrequestdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materialrequest_id');
            $table->integer('material_id');
            $table->decimal('store_type');
            $table->decimal('number');
            $table->decimal('quantity');
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
        Schema::dropIfExists('materialrequestdetails');
    }
}
