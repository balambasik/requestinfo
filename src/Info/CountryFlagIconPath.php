<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\GeoConverter;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class CountryFlagIconPath
{
    private $countryAlfa2;

    public function __construct(CountryAlfa2 $countryAlfa2)
    {
        $this->countryAlfa2 = $countryAlfa2;
    }

    public function getInfo()
    {
        if (!$this->countryAlfa2->getInfo()) {
            return null;
        }

        return dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "flags" . DIRECTORY_SEPARATOR . $this->countryAlfa2->getInfo() . ".png";
    }


    public function getBase64()
    {
        if (!$this->countryAlfa2->getInfo()) {
            return null;
        }

        $file = @file_get_contents(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "flags" . DIRECTORY_SEPARATOR . $this->countryAlfa2->getInfo() . ".png");

        return base64_encode($file);

    }

}