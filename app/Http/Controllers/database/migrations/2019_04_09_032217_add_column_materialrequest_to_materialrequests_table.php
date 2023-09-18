<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMaterialrequestToMaterialrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materialrequests', function (Blueprint $table) {
            $table->string('place_import');
            $table->string('place_export');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('materialrequests', function (Blueprint $table) {
            $table->dropColumn('place_import');
            $table->dropColumn('place_export');
            $table->dropColumn('address');
        });
    }
}
