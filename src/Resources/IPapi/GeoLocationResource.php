<?php

namespace Hutchh\IpGeoinfo\Resources\IPapi;
use Hutchh\IpGeoinfo\Resources\abstractBuilder;

class GeoLocationResource extends abstractBuilder {
     
    protected $fillable = [
        "ip",
        "hostname",
        "city",
        "region",
        "country",
        "countryCode",
        "location",
        "org",
        "postal",
        "timezone",
    ];

    public function __construct(array $attributes = []){
        $this->fill($attributes);
        $this->attributes['location']   = (new LocationResource($attributes))->toArray();
    }

    public function setQueryAttribute($value){
        $this->attributes['ip'] = $value;
    }

    public function setZipAttribute($value){
        $this->attributes['postal'] = $value;
    }

    public function setRegionAttribute($value){
        //
    }

    public function setRegionNameAttribute($value){
        $this->attributes['region'] = $value;
    }
    
}