<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToEquipmentrequestdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipmentrequestdetails', function (Blueprint $table) {
            //
            $table->decimal('invoice_value',16,2);
            $table->decimal('grossweight',16,2);
            $table->decimal('netweight',16,2);
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
