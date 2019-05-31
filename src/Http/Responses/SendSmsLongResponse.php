<?php
namespace Dartui\Multiinfo\Http\Responses;

class SendSmsLongResponse extends Response
{
    public function getMessageIds()
    {
        return $this->data;
    }

    public function toArray()
    {
        return [
            'messageIds' => $this->getMessageId(),
        ];
    }
}
