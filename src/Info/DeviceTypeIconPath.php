<?php

namespace Balambasik\RequestInfo\Info;

class DeviceTypeIconPath
{
    private $deviceType;

    public function __construct(DeviceType $deviceType)
    {
        $this->deviceType = $deviceType;
    }

    public function getInfo()
    {
        return $this->getIconPath();
    }

    protected function getIconPath()
    {
        return dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "types" . DIRECTORY_SEPARATOR . $this->deviceType->getInfo() . ".png";
    }

    public function getBase64()
    {
        if (!$this->deviceType->getInfo()) {
            return null;
        }

        $file = @file_get_contents(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "types" . DIRECTORY_SEPARATOR . $this->deviceType->getInfo() . ".png");

        return base64_encode($file);

    }
}