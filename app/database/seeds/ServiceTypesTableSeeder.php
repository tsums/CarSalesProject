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
        ServiceType::create([
            'name' => 'Tire Rotation',
            'description' => 'Rotate Tires',
            'suggested_price' => 56.65
        ]);
        ServiceType::create([
            'name' => 'Add Fluids',
            'description' => 'Top all Fluids off.',
            'suggested_price' => 60.00
        ]);
    }

} 