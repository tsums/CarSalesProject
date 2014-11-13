<?php

/**
 * Class Service
 *
 * Service Model for a single service appointment which represents a single car being brought in for service.
 */
class Service extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['car_id', 'scheduled', 'arrived', 'departed', 'time_est'];

    public function actions()
    {
        return $this->hasMany('ServiceAction');
    }

    public function car()
    {
        return $this->belongsTo('Car');
    }

}