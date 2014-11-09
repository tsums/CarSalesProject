<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Car::create([
                'VIN' => $faker->creditCardNumber,
                'make' => $faker->word,
                'model' => $faker->word,
                'year' => $faker->year,
                'color' => $faker->colorName,
                'msrp' => $faker->numberBetween(17000, 35000),
                'sold' => $faker->boolean()
			]);
		}
	}

}