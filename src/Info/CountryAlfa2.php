<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class CountryAlfa2 implements InfoInterface
{
    private $baseRequestInfo;

    public function __construct(BaseRequestInfo $baseRequestInfo)
    {
        $this->baseRequestInfo = $baseRequestInfo;
    }

    public function getInfo()
    {
        return $this->baseRequestInfo->sypexGeo->getCountry($this->baseRequestInfo->ip) ?: null;
    }

}