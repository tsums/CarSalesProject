<?php

use Illuminate\Database\Migrations\Migration;

class RefactorServiceServiceTypeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('service_service_type', 'appointment_service_type');
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
