<?php

namespace Balambasik\RequestInfo\Info;

class PlatformIconPath
{
    private $platform;

    public function __construct(Platform $platform)
    {
        $this->platform = $platform;
    }

    public function getInfo()
    {
        return $this->getIconPath();
    }

    protected function getIconPath()
    {
        return dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "platforms" . DIRECTORY_SEPARATOR . $this->platform->getInfo() . ".png";
    }

    public function getBase64()
    {
        if (!$this->platform->getInfo()) {
            return null;
        }

        $file = @file_get_contents(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "platforms" . DIRECTORY_SEPARATOR . $this->platform->getInfo() . ".png");

        return base64_encode($file);

    }
}