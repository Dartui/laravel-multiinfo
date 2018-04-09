<?php
namespace Dartui\Multiinfo\Http\Requests;

class GetSmsRequest extends Request
{
    protected $action = 'getSms';

    protected $url = 'getsms.aspx';

    protected $timeout;

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function toArray()
    {
        return [
            'timeout' => $this->timeout,
        ];
    }
}
