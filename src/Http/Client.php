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
            'curl'     => [
                CURLOPT_SSLCERTTYPE => $config->get('multiinfo.cert.type', 'PEM'),
            ],
        ];

        if ($config->get('multiinfo.cert.is_nss')) {
            putenv(sprintf('SSL_DIR=%s', $config->get('multiinfo.cert.path', '')));

            $options['curl'][CURLOPT_SSLCERT] = $config->get('multiinfo.cert.nicename');
        } else {
            $options['cert'] = [
                $config->get('multiinfo.cert.path'),
                $config->get('multiinfo.cert.password'),
            ];
        }

        parent::__construct($options);
    }
}
