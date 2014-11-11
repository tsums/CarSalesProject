<?php

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