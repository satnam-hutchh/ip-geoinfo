<?php

namespace Hutchh\IpGeoinfo\Resources\IPstack;
use Hutchh\IpGeoinfo\Resources\abstractBuilder;

class TimezoneResource extends abstractBuilder {
    protected $fillable = [
        "timezone",
    ];  
    
    public function getTimezoneAttribute(){
        return $this->attributes['timezone']??null;
    }

    public function setIdAttribute($value){
        $this->attributes['timezone'] = $value;
    }
}