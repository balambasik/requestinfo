<?php

namespace Balambasik\RequestInfo\Interfaces;


use Balambasik\RequestInfo\BaseRequestInfo;

interface InfoInterface
{
    public function __construct(BaseRequestInfo $baseRequestInfo);

    public function getInfo();
}