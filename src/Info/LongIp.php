<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class LongIp implements InfoInterface
{
    private $baseRequestInfo;

    public function __construct(BaseRequestInfo $baseRequestInfo)
    {
        $this->baseRequestInfo = $baseRequestInfo;
    }

    public function getInfo()
    {
        return intval(sprintf("%u", ip2long($this->baseRequestInfo->ip)));
    }

}