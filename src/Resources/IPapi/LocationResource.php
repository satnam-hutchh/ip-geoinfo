<?php

namespace Hutchh\IpGeoinfo\Resources\IPapi;
use Hutchh\IpGeoinfo\Resources\abstractBuilder;

class LocationResource extends abstractBuilder {
    protected $fillable = [
        "latitude",
        "longitude",
    ];  
    
    public function setLatAttribute($value){
        $this->attributes['latitude'] = $value;
    }

    public function setLonAttribute($value){
        $this->attributes['longitude'] = $value;
    }
}