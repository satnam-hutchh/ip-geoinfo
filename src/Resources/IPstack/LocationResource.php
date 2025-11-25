<?php

namespace Hutchh\IpGeoinfo\Resources\IPstack;
use Hutchh\IpGeoinfo\Resources\abstractBuilder;

class LocationResource extends abstractBuilder {
    protected $fillable = [
        "latitude",
        "longitude",
    ];    
}