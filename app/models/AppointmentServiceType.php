<?php

/**
 * Created by PhpStorm.
 * User: trevor
 * Date: 11/15/14
 * Time: 9:37 PM
 */
class AppointmentServiceType extends Eloquent
{

    public $timestamps = false;

    protected $table = 'appointment_service_type';

    protected $hidden = ['service_id', 'service_type_id', 'appointment_id'];

    /* Relationships */
    public function appointment()
    {
        return $this->belongsTo('Appointment');
    }

    public function type()
    {
        return $this->belongsTo('ServiceType', 'service_type_id');
    }


}