<?php
namespace Dartui\Multiinfo\Factories;

use Dartui\Multiinfo\Http\Requests as Request;

class RequestFactory
{
    protected static $requests = [
        'sendSms'     => Request\SendSmsRequest::class,
        'sendSmsLong' => Request\SendSmsLongRequest::class,
        'getSms'      => Request\GetSmsRequest::class,
        'confirmSms'  => Request\ConfirmSmsRequest::class,
        'package'     => Request\PackageRequest::class,
    ];

    public static function getRequest($action)
    {
        if (array_key_exists($action, static::$requests)) {
            return static::$requests[$action];
        }
    }
}
