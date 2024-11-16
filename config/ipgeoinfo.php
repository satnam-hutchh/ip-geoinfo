<?php

return [
    'driver'    => env('IPGEOINFO_DRIVER', 'ip-info'),
    
    'ip-info'    => [
        'token'         => env('IPGEOINFO_TOKEN', '--token--'),
        'base_url'      => 'https://ipinfo.io',
        'timeout'       => 30.0, // in second
    ]
];