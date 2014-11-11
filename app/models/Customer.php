<?php

/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 4:36 PM
 */
class Customer extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['name_first', 'name_last', 'address_1', 'address_2', 'city', 'zip', 'state', 'phone', 'email', 'birthDate'];

    public function sales()
    {
        return $this->hasMany('Sale');
    }

    public function cars()
    {
        return $this->belongsToMany('Car', 'sales', 'customer_id', 'car_id')->withPivot('customer_id', 'car_id');
    }
} 