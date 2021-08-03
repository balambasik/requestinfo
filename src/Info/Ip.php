<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class Ip implements InfoInterface
{
    private $baseRequestInfo;

    public function __construct(BaseRequestInfo $baseRequestInfo)
    {
        $this->baseRequestInfo = $baseRequestInfo;
    }

    public function getInfo()
    {
        return $this->baseRequestInfo->ip;
    }

}