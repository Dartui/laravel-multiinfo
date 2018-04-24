<?php
namespace Dartui\Multiinfo\Http\Requests;

use Dartui\Multiinfo\Contracts\Request as RequestContract;
use Dartui\Multiinfo\Http\Client;
use Dartui\Multiinfo\Http\RequestHandler;
use Dartui\Multiinfo\Multiinfo;

abstract class Request implements RequestContract
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

    protected function auth()
    {
        return [
            'serviceId' => $this->multiinfo->getConfig('service_id'),
            'login'     => $this->multiinfo->getConfig('login'),
            'password'  => $this->multiinfo->getConfig('password'),
        ];
    }

    public function toArray()
    {
        return [];
    }

    public function toQuery()
    {
        return array_merge($this->auth(), $this->toArray());
    }
}
