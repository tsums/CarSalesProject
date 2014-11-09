<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('cars')->delete();
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
            $cost = $faker->numberBetween(12500, 27000);
			Car::create([
                'VIN' => substr(strtoupper($faker->md5),16),
                'make' => $faker->word,
                'model' => $faker->word,
                'year' => $faker->year,
                'color' => $faker->colorName,
                'msrp' => $cost * 1.15,
                'cost' => $cost,
                'sold' => $faker->boolean()
			]);
		}
	}

}