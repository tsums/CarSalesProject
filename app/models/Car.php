<?php

/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 8:44 PM
 */
class Car extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at'];

    public function sale()
    {
        return $this->hasOne('Sale');
    }


    public function customer()
    {
        $sale = $this->sale();
        return $sale->getResults()->belongsTo('Customer');
    }

    public function services()
    {
        return $this->hasMany('Service');
    }

} 