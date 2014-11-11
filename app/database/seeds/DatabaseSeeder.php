<?php

use Faker\Factory as Faker;
use Faker\Provider\en_US\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO seeder is broken because foreign keys.
        Eloquent::unguard();

        DB::table('sales')->delete();
        $this->call('CustomerTableSeeder');
        $this->call('CarsTableSeeder');
    }

}

class CustomerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('customers')->delete();

        $faker = Faker::create();

        foreach (range(1, 20) as $index) {

            Customer::create([
                'name_first' => $faker->firstName,
                'name_last' => $faker->lastName,
                'address_1' => $faker->buildingNumber . " " . $faker->streetName,
                'address_2' => rand(0, 10) <= 2 ? Address::secondaryAddress() : "",
                'city' => $faker->city,
                'state' => Address::stateAbbr(),
                'phone' => $this->phone(),
                'email' => $faker->safeEmail,
                'zip' => $this->zip(),
                'birthDate' => $faker->dateTimeBetween('1950-01-01', '1992-01-01')
            ]);
        }
    }

    // best I can do to make a definite US phone in the format we want to standardize on.
    protected function phone()
    {
        $phone = "";
        foreach ([2,2,3] as $upper)
        {
            foreach (range(0, $upper) as $index) {
                $phone = $phone . Address::randomDigitNotNull();
            }
            if ($upper == 2) $phone = $phone . '-';
        }
        return $phone;
    }

    // only want 5 digit zips
    protected function zip()
    {
        $zip = "";
        foreach (range(0, 4) as $index) {
            $zip = $zip . Address::randomDigitNotNull();
        }
        return $zip;
    }

}
