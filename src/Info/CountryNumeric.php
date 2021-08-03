<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\GeoConverter;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class CountryNumeric
{
    private $countryAlfa2;

    public function __construct(CountryAlfa2 $countryAlfa2)
    {
        $this->countryAlfa2 = $countryAlfa2;
    }

    public function getInfo()
    {
        $geoConverter = new GeoConverter($this->countryAlfa2->getInfo());

        return $geoConverter->convert()->numeric;
    }

}