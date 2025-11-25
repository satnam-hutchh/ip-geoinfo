<?php

namespace Hutchh\IpGeoinfo\Resources\IPinfo;
use Hutchh\IpGeoinfo\Resources\abstractBuilder;

class LocationResource extends abstractBuilder {
    protected $fillable = [
        "latitude",
        "longitude",
    ];    
}