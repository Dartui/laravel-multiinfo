<?php
namespace Dartui\Multiinfo\Http;

use Dartui\Multiinfo\Contracts\Request;
use Dartui\Multiinfo\Factories\ResponseFactory;

class RequestHandler
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $response = ResponseFactory::getResponse($this->action());

        return new $response($this);
    }

    public function request()
    {
        return $this->request;
    }

    public function action()
    {
        return $this->request->action();
    }

    public function response()
    {
        return $this->request->client()->get($this->request->url(), [
            'query' => $this->request->toQuery(),
        ]);
    }
}
