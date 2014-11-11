<?php

/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 9:24 PM
 */
class Sale extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['when', 'customer_id', 'car_id', 'price'];

    public function car()
    {
        return $this->belongsTo('Car');
    }

    public function customer()
    {
        return $this->belongsTo('Customer');
    }

} 