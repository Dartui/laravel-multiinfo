<?php
namespace Dartui\Multiinfo\Http\Responses;

use Dartui\Multiinfo\Contracts\Response as ResponseContract;
use Dartui\Multiinfo\Http\RequestHandler;

abstract class Response implements ResponseContract
{
    protected $response;

    protected $code;

    protected $description;

    public function __construct(RequestHandler $handler)
    {
        $this->response = $handler->response();

        $this->process();
    }
    protected function process()
    {
        $data = explode("\r\n", $this->getContents());

        $this->code        = isset($data[0]) ? $data[0] : null;
        $this->description = isset($data[1]) ? $data[1] : null;
        $this->data        = explode("\n", $this->description);
    }

    protected function getData($key, $default = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    public function getReasonPhrase()
    {
        return $this->response->getReasonPhrase();
    }

    public function getBody()
    {
        return $this->response->getBody();
    }

    public function getContents()
    {
        return $this->getBody()->getContents();
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function hasError()
    {
        return $this->code < 0;
    }

    public function getError()
    {
        return $this->hasError() ? $this->description : null;
    }

    public function toArray()
    {
        return [];
    }
}
