<?php

/**
 * Class Customer
 *
 * Customer model which contains identifying information about a specific customer.
 */
class Customer extends Eloquent
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    protected $fillable = ['name_first', 'name_last', 'address_1', 'address_2', 'city', 'zip', 'state', 'phone', 'email', 'birthDate'];

    /* Relationships */
    public function sales()
    {
        return $this->hasMany('Sale');
    }

    public function cars()
    {
        return $this->belongsToMany('Car', 'sales')->withPivot(['price']);
    }
} 