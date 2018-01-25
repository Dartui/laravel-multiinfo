<?php

return [
    'url'        => 'https://api1.multiinfo.plus.pl', // API base URL

    'login'      => null, // API user login
    'password'   => null, // API user password
    'service_id' => null, // API user service id

    'cert'       => [
        'path'     => null,  // Certificate absolute path on server
        'password' => null,  // Certificate password
        'type'     => 'P12', // Certificate type (PEM or P12)
    ],
];
