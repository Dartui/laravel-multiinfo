<?php
namespace Dartui\Multiinfo\Http\Responses;

class SendSmsResponse extends Response
{
    public function getMessageId()
    {
        return $this->getData(0);
    }

    public function toArray()
    {
        return [
            'messageId' => $this->getMessageId(),
        ];
    }
}
