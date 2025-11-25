<?php

return [
    'driver'    => env('IPGEOINFO_DRIVER', 'ip-info'),
    
    'ip-info'    => [
        'token'         => env('IPINFO_TOKEN', '--token--'),
        'base_url'      => 'https://ipinfo.io',
        'timeout'       => 30.0, // in second
    ],
    'ip-api' => [
        'token'     => env('IPAPI_TOKEN', '--token--'),
        'base_url'  => 'http://ip-api.com',
        'timeout'   => 30.0, // in second
    ],
    'ip-stack' => [
        'access_key'    => env('IPSTACK_ACCESS_KEY', '--access_key--'),
        'base_url'      => 'http://api.ipstack.com',
        'timeout'       => 30.0, // in second
    ],
];