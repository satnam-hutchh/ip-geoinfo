<?php

namespace Hutchh\IpGeoinfo\Resources\IPstack;
use Hutchh\IpGeoinfo\Resources\abstractBuilder;

class ConnectionResource extends abstractBuilder {
    protected $fillable = [
        "isp",
        "carrier",
    ];  
    
    public function getCarrierAttribute(){
        return $this->attributes['carrier']??$this->attributes['isp']??null;
    }
}