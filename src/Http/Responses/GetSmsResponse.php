<?php
namespace Dartui\Multiinfo\Http\Responses;

use Carbon\Carbon;

class GetSmsResponse extends Response
{
    public function getMessageId()
    {
        return $this->getData(0);
    }

    public function getSender()
    {
        return $this->getData(1);
    }

    public function getReceiver()
    {
        return $this->getData(2);
    }

    public function getMessageType()
    {
        return $this->getData(3);
    }

    public function getMessage()
    {
        if ($message = $this->getData(4)) {
            return urldecode($message);
        }
    }

    public function getProtocol()
    {
        return $this->getData(5);
    }

    public function getEncoding()
    {
        return $this->getData(6);
    }

    public function getServiceId()
    {
        return $this->getData(7);
    }

    public function getConnector()
    {
        return $this->getData(8);
    }

    public function getReceiveDate()
    {
        if ($date = $this->getData(9)) {
            return Carbon::createFromFormat('dmyHis', $date);
        }
    }

    public function toArray()
    {
        return [
            'messageId'   => $this->getMessageId(),
            'sender'      => $this->getSender(),
            'receiver'    => $this->getReceiver(),
            'messageType' => $this->getMessageType(),
            'message'     => $this->getMessage(),
            'protocol'    => $this->getProtocol(),
            'encoding'    => $this->getEncoding(),
            'serviceId'   => $this->getServiceId(),
            'connector'   => $this->getConnector(),
            'receiveDate' => $this->getReceiveDate(),
        ];
    }
}
