<?php
/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 9:24 PM
 */

class Sale extends Eloquent {

    protected $fillable = ['when', 'customer_id', 'car_VIN', 'price'];

    public function car() {
        return $this->hasOne('Car', 'VIN', 'car_VIN');
    }

    public function customer() {
        return $this->belongsTo('Customer');
    }

} 