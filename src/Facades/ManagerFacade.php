<?php

namespace Hutchh\IpGeoinfo\Facades;

use Illuminate\Support\Facades\Facade;
use Hutchh\IpGeoinfo\Managers;

class ManagerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Managers\IpGeoinfoManager::class;
    }
}