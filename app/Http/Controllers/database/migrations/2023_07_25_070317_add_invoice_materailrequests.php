<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceMaterailrequests extends Migration
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

            $table->string('incoterm',15);
            $table->string('billnumber',45);
            $table->date('billdate')->nullable();
            $table->string('currency',15);
            $table->decimal('exchange_rate',8,2);
            $table->decimal('invoice_value_other_currency',16,2);
 

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
