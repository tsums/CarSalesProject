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

    protected $appends = ['total_cost', 'status'];

    protected $with = ['service_types.type', 'car'];

    /* Attributes */

    public function getTotalCostAttribute()
    {
        $total = 0.0;
        if (!empty($this->service_types)) {
            foreach ($this->service_types as $service) {
                $total += $service->price;
            }
        }
        return $total;
    }

    public function getStatusAttribute()
    {
        if (empty($this->arrived)) {
            return "scheduled";
        }
        if (empty($this->departed)) {
            return "in_progress";
        }
        return "completed";
    }

    public function getArrivedAttribute()
    {
        return date('c', strtotime($this->attributes['arrived']));
    }

    public function getDepartedAttribute()
    {
        return date('c', strtotime($this->attributes['departed']));
    }

    public function getScheduledAttribute()
    {
        return date('c', strtotime($this->attributes['arrived']));
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