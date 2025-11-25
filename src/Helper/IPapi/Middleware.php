<?php
namespace Hutchh\IpGeoinfo\Helper\IPinfo;
use Psr\Http\Message\RequestInterface;

final class Middleware
{
    /**
     * Middleware that modifies the request to the API.
     *
     * @return callable Returns a function that accepts the next handler
     */
    public static function mapRequest()
    {
        return \GuzzleHttp\Middleware::mapRequest(function (RequestInterface $request) {
            // Add format into url.
            $request = $request->withUri($request->getUri()->withPath("{$request->getUri()->getPath()}/json"));

            return $request;
        });
    }
}