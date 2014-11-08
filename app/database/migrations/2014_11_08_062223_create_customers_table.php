<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string("name_first");
            $table->string("name_last");

            $table->string("address_1");
            $table->string("address_2")->nullable();

            $table->date("birthDate");

            $table->string("city");
            $table->string("state");
            $table->string("zip");

            $table->string("phone");
            $table->string("email");
            $table->unique('email');
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
		Schema::drop('customers');
	}

}
