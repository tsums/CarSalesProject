<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Provider\en_US\Address;
use Faker\Provider\en_US\PhoneNumber;

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
                'phone' => $this->phone(),
                'email' => $faker->safeEmail,
                'zip' => $this->zip(),
                'birthDate' => $faker->dateTimeBetween('1950-01-01', '1992-01-01')
            ]);
        }
    }

    protected function phone() {
        $phone = "";
        foreach (range(0,2) as $index) {
            $phone = $phone . Address::randomDigitNotNull();
        }
        $phone = $phone . '-';
        foreach (range(0,2) as $index) {
            $phone = $phone . Address::randomDigitNotNull();
        }
        $phone = $phone . '-';
        foreach (range(0,3) as $index) {
            $phone = $phone . Address::randomDigitNotNull();
        }
        return $phone;
    }

    protected function zip() {
        $zip = "";
        foreach(range(0,4) as $index) {
            $zip = $zip . Address::randomDigitNotNull();
        }
        return $zip;
    }

}
