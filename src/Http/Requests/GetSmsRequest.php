<?php
namespace Dartui\Multiinfo\Http\Requests;

class GetSmsRequest extends Request
{
    protected $action = 'getSms';

    protected $url = 'getsms.aspx';

    protected $timeout;

    protected $manualConfirmation;

    protected $delete;

    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function setManualConfirmation($manual = false)
    {
        $this->manualConfirmation = $manual;

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
            'timeout'       => $this->timeout,
            'manualconfirm' => $this->manualConfirmation,
            'deleteContent' => $this->delete,
        ];
    }
}
