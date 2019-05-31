<?php
namespace Dartui\Multiinfo\Http\Requests;

class SendSmsLongRequest extends Request
{
    protected $action = 'sendSmsLong';

    protected $url = 'sendsmslong.aspx';

    protected $destination;

    protected $message;

    protected $origin;

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

    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    public function toArray()
    {
        return [
            'dest' => $this->destination,
            'text' => $this->message,
            'orig' => $this->origin,
        ];
    }
}
