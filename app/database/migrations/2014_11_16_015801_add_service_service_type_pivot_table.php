<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddServiceServiceTypePivotTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_service_type', function (Blueprint $table) {
            $table->integer('service_id')->unsigned();
            $table->integer('service_type_id')->unsigned();

            $table->primary(['service_id', 'service_type_id']);

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('service_type_id')->references('id')->on('service_types');

            $table->decimal('price');

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
