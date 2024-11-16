<?php
namespace Hutchh\IpGeoinfo\Helper;
interface ClientInterface{
    function getIPGeoAddress(string $ipAddress);
}