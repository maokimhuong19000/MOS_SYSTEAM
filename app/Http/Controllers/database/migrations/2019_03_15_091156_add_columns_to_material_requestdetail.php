<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToMaterialRequestdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

       Schema::table('materialrequestdetails', function (Blueprint $table) {
           

            $table->decimal('store_type' ,3,2)->change();
            $table->decimal('number' ,16,0)->change();
            $table->decimal('quantity',16,6)->change();
           
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
