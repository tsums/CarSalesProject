<?php
/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/12/14
 * Time: 8:47 PM
 */

/**
 * Class ServiceType
 *
 * ServiceType defines the kinds of ServiceActions possible and their standard parameters.
 */
class ServiceType extends Eloquent {

    public $timestamps = false;

    public $hidden = ['pivot'];

    /* Relationships */

    public function appointments()
    {
        $this->belongsToMany('Appointment');
    }

} 