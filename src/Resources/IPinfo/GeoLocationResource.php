<?php

namespace Hutchh\IpGeoinfo\Resources\IPinfo;
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

    public function setLocAttribute($value){
        list($latitude,$longitude)  = explode(',',$value);
        $this->attributes['location']   = (new LocationResource([
            "latitude"  => $latitude,
            "longitude" => $longitude,
        ]))->toArray();
    }
    
    public function setCountryAttribute($value){
        $this->attributes['country']        = $value;
        $this->attributes['countryCode']    = $value;
    }
}