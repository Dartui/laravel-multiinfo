<?php
namespace Dartui\Multiinfo\Http;

use GuzzleHttp\Client as BaseClient;
use Illuminate\Config\Repository as Config;

class Client extends BaseClient
{
    public function __construct(Config $config)
    {
        $options = [
            'base_uri' => $config->get('multiinfo.url'),
            'cert'     => [
                $config->get('multiinfo.cert.path'),
                $config->get('multiinfo.cert.password'),
            ],
            'curl'     => [
                CURLOPT_SSLCERTTYPE => $config->get('multiinfo.cert.type', 'PEM'),
            ],
        ];

        parent::__construct($options);
    }
}
