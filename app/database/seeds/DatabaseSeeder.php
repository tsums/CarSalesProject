<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider\en_US\Address;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        DB::table('sales')->delete();
		$this->call('CustomerTableSeeder');
        $this->call('CarsTableSeeder');
	}

}

class CustomerTableSeeder extends Seeder {

    public function run() {
        DB::table('customers')->delete();

        $faker = Faker::create();
        foreach(range(1,20) as $index) {
            Customer::create([
                'name_first' => $faker->firstName,
                'name_last' => $faker->lastName,
                'address_1' => $faker->buildingNumber . " " . $faker->streetName,
                'address_2' => rand(0,10) <=2 ? Address::secondaryAddress() : "",
                'city' => $faker->city,
                'state' => Address::stateAbbr(),
                'phone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'zip' => Address::postcode(),
                'birthDate' => $faker->dateTimeBetween('1950-01-01', date('c'))
            ]);
        }
    }

}
