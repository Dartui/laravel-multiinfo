<?php
namespace Dartui\Multiinfo\Factories;

use Dartui\Multiinfo\Http\Responses\GetSmsResponse;
use Dartui\Multiinfo\Http\Responses\SendSmsResponse;

class ResponseFactory
{
    protected static $responses = [
        'sendSms' => SendSmsResponse::class,
        'getSms'  => GetSmsResponse::class,
    ];

    public static function getResponse($action)
    {
        if (array_key_exists($action, static::$responses)) {
            return static::$responses[$action];
        }
    }
}
