<?php

namespace Hutchh\IpGeoinfo\Managers;

use Hutchh\IpGeoinfo\Helper;
use Hutchh\IpGeoinfo\Payload;

use Illuminate\Support\Manager;
use Illuminate\Support\Facades\Log;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\HandlerStack;

class IpGeoinfoManager extends Manager
{
    public function getDefaultDriver(){
        return $this->config->get('ipgeoinfo.driver','ip-info');
    }

    protected function createIpInfoDriver() : Helper\ClientInterface{
        $config = $this->config->get('ipgeoinfo.ip-info', []);
        $handler = HandlerStack::create();
        $client = new Client([
            // RequestOptions::HTTP_ERRORS     => false,
            RequestOptions::HEADERS         => [
                'accept'        => 'application/json',
                'content-type'  => 'application/json',
                'Authorization' => "Bearer ".$config['token'],
            ],
            RequestOptions::TIMEOUT         => 15,
            RequestOptions::CONNECT_TIMEOUT => 15,
            'base_uri'  => $config['base_url'],
            'handler'   => $handler,
        ]);
        return new Helper\IPinfo\IPinfoClient($client, $config);
    }

    protected function createIpApiDriver() : Helper\ClientInterface{
        $config = $this->config->get('ipgeoinfo.ip-api', []);
        $handler = HandlerStack::create();
        $client = new Client([
            // RequestOptions::HTTP_ERRORS     => false,
            RequestOptions::HEADERS         => [
                'accept'        => 'application/json',
                'content-type'  => 'application/json',
            ],
            RequestOptions::TIMEOUT         => 15,
            RequestOptions::CONNECT_TIMEOUT => 15,
            'base_uri'  => $config['base_url'],
            'handler'   => $handler,
        ]);
        return new Helper\IPapi\IPapiClient($client, $config);
    }

    protected function createIpStackDriver() : Helper\ClientInterface{
        $config = $this->config->get('ipgeoinfo.ip-stack', []);
        $handler = HandlerStack::create();
        $handler->unshift(Helper\IPstack\Middleware::mapRequest($config));
        $client = new Client([
            // RequestOptions::HTTP_ERRORS     => false,
            RequestOptions::HEADERS         => [
                'accept'        => 'application/json',
                'content-type'  => 'application/json',
            ],
            RequestOptions::TIMEOUT         => 15,
            RequestOptions::CONNECT_TIMEOUT => 15,
            'base_uri'  => $config['base_url'],
            'handler'   => $handler,
        ]);
        return new Helper\IPstack\IPstackClient($client, $config);
    }

    public function getIPGeoAddress(string $ipAddress){
        try{
            return $this->driver()->getIPGeoAddress($ipAddress);
        }catch(\Throwable $e){
            throw $e;
        }
    }
}