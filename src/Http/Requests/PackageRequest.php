<?php
namespace Dartui\Multiinfo\Http\Requests;

class PackageRequest extends SendSmsRequest
{
    protected $action = 'package';

    protected $url = 'package.aspx';

    protected $destinations = [];

    protected $message;

    protected $origin;

    public function setDestination($number)
    {
        if (!is_array($number)) {
            $number = func_get_args();
        }

        $this->destinations = (object) [
            'number'  => $number,
            'message' => false,
        ];

        return $this;
    }

    public function addDestination($number, $message = false)
    {
        if ($message !== false) {
            $this->destinations[] = (object) [
                'number'  => $number,
                'message' => $message,
            ];
        } elseif (!in_array($number, $this->destinations, true)) {
            // Add only unique destinations
            $this->destinations[] = (object) [
                'number'  => $number,
                'message' => false,
            ];
        }

        return $this;
    }

    public function addDestinations($numbers)
    {
        if (!is_array($numbers)) {
            $numbers = func_get_args();
        }

        foreach ($numbers as $number) {
            $this->addDestination($number);
        }

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
            'text' => $this->message,
            'orig' => $this->origin,
        ];
    }

    public function toQuery()
    {
        $query = http_build_query(parent::toQuery());

        foreach ($this->destinations as $destination) {
            $query .= sprintf('&dest=%s', $destination->number);

            if ($destination->message !== false) {
                $query .= sprintf(',%s', urlencode($destination->message));
            }
        }

        return $query;
    }
}
