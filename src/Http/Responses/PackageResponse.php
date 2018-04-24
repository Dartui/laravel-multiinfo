<?php
namespace Dartui\Multiinfo\Http\Responses;

class PackageResponse extends Response
{
    public function getPackageId()
    {
        return $this->getData(0);
    }

    public function toArray()
    {
        return [
            'packageId' => $this->getPackageId(),
        ];
    }
}
