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
        return new Helper\IpInfo\IpInfoClient($client, $config);
    }

    public function convertFromIntent(Payload\ConvertFromPayloadBuilder $convertPayload){
        try{
            return $this->driver()->convertFromIntent($convertPayload);
        }catch(\Throwable $e){
            throw $e;
        }
    }
}