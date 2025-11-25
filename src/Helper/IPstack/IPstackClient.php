<?php
namespace Hutchh\IpGeoinfo\Helper\IPstack;
use Hutchh\IpGeoinfo\Helper;
use Hutchh\IpGeoinfo\Payload;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Exception\ClientException;
use Hutchh\IpGeoinfo\Resources\IPstack\GeoLocationResource;
/**
 * Class BaseSender.
 */

class IPstackClient extends Helper\HTTPClient implements Helper\ClientInterface {

    public function getIPGeoAddress(string $ipAddress){
        $response = null;
        $request = new Request('GET', $ipAddress);
        try {            
            $responseData       = $this->client->send($request);
            $response           = json_decode($responseData->getBody()->getContents(), true);
            $responseHeader     = $responseData->getHeaders();
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            $responseDetail    = json_decode($responseBodyAsString, true);
            throw new ClientException($responseDetail['message'],$request, $response);
        }

        return (new GeoLocationResource($response))->toArray();
    }
}