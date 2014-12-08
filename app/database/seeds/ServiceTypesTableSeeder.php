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

        ServiceType::create([
            'name' => 'Brake Pads - Front',
            'description' => 'Replace Front Brake Pads',
            'suggested_price' => 45.00
        ]);
        ServiceType::create([
            'name' => 'Brake Pads - Rear',
            'description' => 'Replace Rear Brake Pads',
            'suggested_price' => 45.00
        ]);
        ServiceType::create([
            'name' => 'Spark Plugs - Replace Single',
            'description' => 'Replace a single faulty spark plug.',
            'suggested_price' => 19.95
        ]);
        ServiceType::create([
            'name' => 'Full Inspection - The Works',
            'description' => 'Check all powertrain elements of vehicle.',
            'suggested_price' => 99.95
        ]);
        ServiceType::create([
            'name' => 'Battery Replacement - SUV/Truck',
            'description' => 'Replace Mains Battery',
            'suggested_price' => 139.95
        ]);
        ServiceType::create([
            'name' => 'Battery Replacement - Sedan/Car',
            'description' => 'Replace Mains Battery',
            'suggested_price' => 89.95
        ]);
    }

} 