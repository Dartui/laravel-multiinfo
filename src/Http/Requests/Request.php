<?php
namespace Dartui\Multiinfo\Http\Requests;

use Dartui\Multiinfo\Http\Client;
use Dartui\Multiinfo\Http\RequestHandler;
use Dartui\Multiinfo\Multiinfo;

abstract class Request
{
    protected $multiinfo;

    protected $action;

    protected $client;

    protected $url;

    public function __construct(Multiinfo $multiinfo)
    {
        $this->multiinfo = $multiinfo;
        $this->client    = app(Client::class);
    }

    public function send()
    {
        $handler = new RequestHandler($this);

        return $handler->handle();
    }

    public function action()
    {
        return $this->action;
    }

    public function client()
    {
        return $this->client;
    }

    public function url()
    {
        return $this->url;
    }

    public function parameters()
    {
        return array_merge([
            'serviceId' => $this->multiinfo->getConfig('service_id'),
            'login'     => $this->multiinfo->getConfig('login'),
            'password'  => $this->multiinfo->getConfig('password'),
        ], $this->toArray());
    }

    public function toArray()
    {
        return [];
    }
}
