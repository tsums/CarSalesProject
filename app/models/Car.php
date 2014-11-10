<?php
/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/8/14
 * Time: 8:44 PM
 */

class Car extends Eloquent {

    public function sale() {
        return $this->hasOne('Sale');
    }

    public function services() {
        return $this->hasMany('Service');
    }

} 