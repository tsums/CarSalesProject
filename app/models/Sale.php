<?php
/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 9:24 PM
 */

class Sale extends Eloquent {

    protected $fillable = ['when', 'customer_id', 'VIN', 'price'];

} 