<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RenameServiceIdColumnServiceservicetypeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_service_type', function (Blueprint $table) {
            $table->dropForeign('service_service_type_service_id_foreign');
        });

        Schema::table('service_service_type', function (Blueprint $table) {
            $table->renameColumn('service_id', 'appointment_id');
        });

        Schema::table('service_service_type', function (Blueprint $table) {
            $table->foreign('appointment_id')->references('id')->on('appointments');
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
