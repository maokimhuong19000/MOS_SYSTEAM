<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotarequestdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotarequestdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('quotarequest_id');
            $table->Integer('material_id');
            $table->date('import_date');
            $table->decimal('amount', 16, 2);
            $table->decimal('old_amount', 16, 2);
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
        Schema::dropIfExists('quotarequestdetails');
    }
}
