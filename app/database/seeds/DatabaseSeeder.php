<?php


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
        $this->call('ServiceTypesTableSeeder');
    }

}


