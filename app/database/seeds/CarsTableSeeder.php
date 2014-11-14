<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('cars')->delete();
		$faker = Faker::create();

        //makes fake cars, woo!

        $makes = ['Ford', 'Honda', 'Toyota', 'Chevrolet', 'BMW', 'Oldsmobile', 'Saturn', 'Subaru', 'Dodge', 'Jeep', 'Chrysler', 'Mercedes', 'Tesla', 'Kia', 'Lexus', 'Lincoln', 'Acura', 'GMC'];
        $models = ['Excavator', 'Terminator', 'Cylon', 'Autobot', 'Mercenary', 'Troubadour', 'Cappuccino', 'Enforcer', 'Cosmonaut', 'Plumber', 'Impersonator', 'Relatiator', 'Bludgeoner', 'Pragmatizer', 'Ritualizer', 'Alchemist', 'Partitioner', 'Mover', 'Scribbler', 'Vortex', 'Behemoth', 'Colossus', 'Cerberus', 'Olympus', 'Macchiato', 'Miner', 'Jackrabbit', 'Rumbler', 'Destroyer', 'Corsair'];

		foreach(range(1, 100) as $index)
		{
            $cost = $faker->numberBetween(12500, 27000);
			Car::create([
                'VIN' => substr(strtoupper($faker->md5),16),
                'make' => $makes[array_rand($makes)],
                'model' => $models[array_rand($models)],
                'year' => $faker->year,
                'color' => $faker->colorName,
                'msrp' => $cost * 1.15,
                'cost' => $cost,
			]);
		}
	}

}