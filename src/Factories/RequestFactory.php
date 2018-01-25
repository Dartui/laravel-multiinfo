<?php
namespace Dartui\Multiinfo\Factories;

use Dartui\Multiinfo\Http\Requests\GetSmsRequest;
use Dartui\Multiinfo\Http\Requests\SendSmsRequest;

class RequestFactory
{
    protected static $requests = [
        'sendSms' => SendSmsRequest::class,
        'getSms'  => GetSmsRequest::class,
    ];

    public static function getRequest($action)
    {
        if (array_key_exists($action, static::$requests)) {
            return static::$requests[$action];
        }
    }
}
