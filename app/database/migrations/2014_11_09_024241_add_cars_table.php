<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cars', function(Blueprint $table)
		{
			$table->dropColumn('inStock');
		});

        Schema::table('cars', function(Blueprint $table)
        {
            $table->float('cost');
            $table->dropColumn('msrp');
        });

        Schema::table('cars', function(Blueprint $table)
        {
            $table->float('msrp');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cars', function(Blueprint $table)
		{
            $table->boolean('inStock');
		});
	}

}
