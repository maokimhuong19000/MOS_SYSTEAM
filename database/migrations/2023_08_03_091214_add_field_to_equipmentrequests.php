<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToEquipmentrequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipmentrequests', function (Blueprint $table) {

            //
            $table->smallInteger('transport');
            $table->smallInteger('transit');
            $table->smallInteger('tcountry')->nullable();
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
        Schema::table('equipmentrequests', function (Blueprint $table) {
            //
        });
    }
}
