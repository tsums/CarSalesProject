<?php

class ServiceAction extends Eloquent {

	protected $fillable = [];

    protected $table = 'service_actions';

    public function service() {
        return $this->belongsTo('Service');
    }

}