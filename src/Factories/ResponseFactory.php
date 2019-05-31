<?php
namespace Dartui\Multiinfo\Factories;

use Dartui\Multiinfo\Http\Responses as Response;

class ResponseFactory
{
    protected static $responses = [
        'sendSms'     => Response\SendSmsResponse::class,
        'sendSmsLong' => Response\SendSmsLongResponse::class,
        'getSms'      => Response\GetSmsResponse::class,
        'confirmSms'  => Response\ConfirmSmsResponse::class,
        'package'     => Response\PackageResponse::class,
    ];

    public static function getResponse($action)
    {
        if (array_key_exists($action, static::$responses)) {
            return static::$responses[$action];
        }
    }
}
