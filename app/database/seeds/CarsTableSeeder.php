<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder {

    private $makes  = ['Ford', 'Honda', 'Toyota', 'Chevrolet', 'BMW', 'Oldsmobile', 'Saturn', 'Subaru', 'Dodge', 'Jeep', 'Chrysler', 'Mercedes', 'Tesla', 'Kia', 'Lexus', 'Lincoln', 'Acura', 'GMC'];
    private $models = ['Excavator', 'Terminator', 'Cylon', 'Autobot', 'Mercenary', 'Troubadour', 'Cappuccino', 'Enforcer', 'Cosmonaut', 'Plumber', 'Impersonator', 'Relatiator', 'Bludgeoner', 'Pragmatizer', 'Ritualizer', 'Alchemist', 'Partitioner', 'Mover', 'Scribbler', 'Vortex', 'Behemoth', 'Colossus', 'Cerberus', 'Olympus', 'Macchiato', 'Miner', 'Jackrabbit', 'Rumbler', 'Destroyer', 'Corsair'];


    public function run()
	{
        DB::table('cars')->delete();
		$faker = Faker::create();

        //makes fake cars, woo!

        $cars    = $this->generateCars();

		foreach(range(1, 100) as $index)
		{
            $cost = $faker->numberBetween(12500, 27000);
            $car = $cars[array_rand($cars)];
			Car::create([
                'VIN' => substr(strtoupper($faker->md5),16),
                'make' => $car['make'],
                'model' => $car['model'],
                'year' => rand(2005, 2015),
                'color' => $faker->colorName,
                'msrp' => $cost * 1.15,
                'cost' => $cost,
			]);
		}
	}

    public function generateCars()
    {
        shuffle($this->models);
        shuffle($this->makes);
        $cars = [];
        foreach ($this->makes as $make) {

            foreach (range(0, 2) as $index) {
                $model = array_pop($this->models);
                echo($model);
                $cars[] = ['make' => $make, 'model' => $model];
            }
            if (count($this->models) == 0) {
                break;
            }

        }
        return $cars;
    }

}