<?php

/**
 * Class ServiceAction
 *
 * ServiceAction is a weak model which represents an action that was taken during a particular Service.
 *
 * TODO relate this with an auto-generated pivot table if applicable.
 */
class ServiceAction extends Eloquent
{

    protected $fillable = [];

    protected $table = 'service_actions';

    public function service()
    {
        return $this->belongsTo('Service');
    }

}