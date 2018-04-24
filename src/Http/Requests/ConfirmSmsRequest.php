<?php
namespace Dartui\Multiinfo\Http\Requests;

class ConfirmSmsRequest extends Request
{
    protected $action = 'confirmSms';

    protected $url = 'confirmsms.aspx';

    protected $messageId;

    protected $delete = false;

    public function setMessageId($id)
    {
        $this->messageId = $id;

        return $this;
    }

    public function setDeleteContent($delete = false)
    {
        $this->delete = $delete;

        return $this;
    }

    public function toArray()
    {
        return [
            'smsId'         => $this->messageId,
            'deleteContent' => $this->delete,
        ];
    }
}
