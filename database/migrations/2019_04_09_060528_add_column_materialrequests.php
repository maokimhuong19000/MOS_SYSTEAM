<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMaterialrequests extends Migration
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
            //
            $table->Integer('customer_id');
            $table->Integer('import_status'); // 0 for pending , 1 cancel , 2 allow import , 3 success
            $table->string('file_import_department' ,250)->nullable(); // not in front 
            $table->string('file_shipping' ,250)->nullable();
            $table->string('file_custom_declareation' ,250);
            $table->string('file_invoice' ,250);
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
