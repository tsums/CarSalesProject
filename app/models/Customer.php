<?php
/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 4:36 PM
 */

class Customer extends Eloquent {

    protected $fillable = ['name_first', 'name_last', 'address_1', 'address_2', 'city', 'zip', 'state', 'phone', 'email', 'birthDate'];

} 