<?php
namespace Dartui\Multiinfo\Http\Requests;

class GetSmsRequest extends Request
{
    protected $action = 'getSms';

    protected $url = 'getsms.aspx';

    public function toArray()
    {
        return [
            'timeout' => 1000,
        ];
    }
}
