<?php
namespace Hutchh\IpGeoinfo\Helper\IPstack;
use Psr\Http\Message\RequestInterface;

final class Middleware
{
    /**
     * Middleware that modifies the request to the API.
     *
     * @return callable Returns a function that accepts the next handler
     */
    public static function mapRequest($config)
    {
        return \GuzzleHttp\Middleware::mapRequest(function (RequestInterface $request) use ($config) {
            $request = $request->withUri($request->getUri()->withQuery("{$request->getUri()->getQuery()}&access_key={$config['access_key']}&output=json"));
            return $request;
        });
    }
}