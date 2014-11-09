<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('VIN');
            $table->unique('VIN');

			$table->string('make');
			$table->string('model');
			$table->string('year');
			$table->string('color');

			$table->string('msrp');

			$table->boolean('inStock');
            $table->boolean('sold');

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
		Schema::drop('cars');
	}

}
