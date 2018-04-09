<?php

return [
    'url'        => env('MULTIINFO_URL', 'https://api1.multiinfo.plus.pl'), // API base URL

    'login'      => env('MULTIINFO_LOGIN'),      // API user login
    'password'   => env('MULTIINFO_PASSWORD'),   // API user password
    'service_id' => env('MULTIINFO_SERVICE_ID'), // API user service id

    'cert'       => [
        'is_nss'   => env('MULTIINFO_CERT_NSS', false),  // Whether cURL is using NSS or no
        'nicename' => env('MULTIINFO_CERT_NICENAME'),    // Nicename of certificate (required for NSS)
        'path'     => env('MULTIINFO_CERT_PATH'),        // Certificate absolute path on server or path to NSS DB
        'password' => env('MULTIINFO_CERT_PASSWORD'),    // Certificate password
        'type'     => env('MULTIINFO_CERT_TYPE', 'P12'), // Certificate type (PEM or P12)
    ],
];
