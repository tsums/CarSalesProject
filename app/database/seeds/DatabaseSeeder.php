<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CustomerTableSeeder');
	}

}

class CustomerTableSeeder extends Seeder {

    public function run() {
        DB::table('customers')->delete();

        Customer::create([
            'name_first' => 'Adam',
            'name_last' => 'Savage',
            'address_1' => 'Mi5',
            'birthDate' => date('c'),
            'city' => 'Donde',
            'state' => 'CA',
            'zip' => '12345',
            'email' => 'adam@savage.com',
            'phone' => '456-454-3456'
        ]);

        Customer::create([
            'name_first' => 'Jaime',
            'name_last' => 'Hyneman',
            'address_1' => 'Mi5',
            'birthDate' => date('c'),
            'city' => 'Los Angeles',
            'state' => 'CA',
            'zip' => '12346',
            'email' => 'jaime@mi5.net',
            'phone' => '456-454-3456'
        ]);

        Customer::create([
            'name_first' => 'Adam',
            'name_last' => 'Savage',
            'address_1' => 'Mi6',
            'birthDate' => date('c'),
            'city' => 'Swag',
            'state' => 'NJ',
            'zip' => '54321',
            'email' => 'adam2@savagecorp.com',
            'phone' => '456-454-3456'
        ]);
    }

}
