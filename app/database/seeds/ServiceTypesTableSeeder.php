<?php
/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/13/14
 * Time: 9:18 PM
 */

class ServiceTypesTableSeeder extends Seeder {

    public function run()
    {
        ServiceType::create([
            'name' => 'Oil Change',
            'description' => 'Change Oil in Car',
            'suggested_price' => 49.95
        ]);
    }

} 