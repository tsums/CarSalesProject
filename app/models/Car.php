<?php

/**
 * Class Car
 *
 * Car model which contains the identifying information about a specific car.
 */
class Car extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at', 'customer', 'pivot'];

    protected $appends = ['owner'];

    /* Attributes */

    // workaround for a one-one relationship using the pivot table 'sales'.
    public function getOwnerAttribute()
    {
        return $this->customer->first();
    }

    /* Scopes */

    public function scopeUnsold($query)
    {
        return $query->has('sale', '<', 1);
    }

    public function scopeSold($query)
    {
        return $query->has('sale');
    }

    /* Related Entities */

    public function customer()
    {
        return $this->belongsToMany('Customer', 'sales');
    }

    public function sale()
    {
        return $this->hasOne('Sale');
    }

    public function appointments()
    {
        return $this->hasMany('Appointment');
    }

} 