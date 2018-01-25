<?php
namespace Dartui\Multiinfo\Http\Requests;

class SendSmsRequest extends Request
{
    protected $action = 'sendSms';

    protected $url = 'sendsms.aspx';

    protected $destination;

    protected $message;

    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function toArray()
    {
        return [
            'dest' => $this->destination,
            'text' => $this->message,
        ];
    }
}
