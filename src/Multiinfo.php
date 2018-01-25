<?php
namespace Dartui\Multiinfo;

use Dartui\Multiinfo\Factories\RequestFactory;
use Illuminate\Contracts\Config\Repository as Config;

class Multiinfo
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function request($action)
    {
        $request = RequestFactory::getRequest($action);

        return new $request($this);
    }

    public function getConfig($key, $default = null)
    {
        $key = "multiinfo.{$key}";

        return $this->config->get($key, $default);
    }
}
