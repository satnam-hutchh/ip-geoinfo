<?php

namespace Hutchh\IpGeoinfo\Resources\IPstack;
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

    public function setLocAttribute($value){
        list($latitude,$longitude)  = explode(',',$value);
        $this->attributes['location']   = (new LocationResource([
            "latitude"  => $latitude,
            "longitude" => $longitude,
        ]))->toArray();
    }
    
    public function setTimeZoneAttribute($value){
        $this->attributes['timezone']   = (new TimezoneResource($value))->timezone;
    }

    public function setConnectionAttribute($value){
        $this->attributes['org']   = (new ConnectionResource($value))->carrier;
    }

    public function setZipAttribute($value){
        $this->attributes['postal']        = $value;
    }

    public function setCountryNameAttribute($value){
        $this->attributes['country']        = $value;
    }

    public function setCountryCodeAttribute($value){
        $this->attributes['countryCode']    = $value;
    }

    public function setRegionNameAttribute($value){
        $this->attributes['region']    = $value;
    }
}