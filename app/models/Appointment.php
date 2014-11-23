<?php

/**
 * Class Service
 *
 * Service Model for a single service appointment which represents a single car being brought in for service.
 */
//TODO rename maintenece.
class Appointment extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['car_id', 'scheduled', 'arrived', 'departed', 'time_est'];

    protected $appends = ['total_cost'];

    /* Attributes */

    public function getTotalCostAttribute()
    {
        $total = 0.0;
        foreach ($this->service_types as $service) {
            $total += $service->price;
        }
        return $total;
    }

    /* Relationships */
    public function car()
    {
        return $this->belongsTo('Car');
    }

    public function actions()
    {
        return $this->belongsToMany('ServiceType')->withPivot('price');
    }

    public function service_types()
    {
        return $this->hasMany('AppointmentServiceType');
    }

}