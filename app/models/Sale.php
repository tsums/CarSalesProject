<?php

/**
 * Class Sale
 *
 * Sale is a weak model which represents a Car being sold to a Customer, along with properties for the relation.
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