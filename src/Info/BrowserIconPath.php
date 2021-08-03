<?php

namespace Balambasik\RequestInfo\Info;

class BrowserIconPath
{
    private $browser;

    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    public function getInfo()
    {
        return $this->getIconPath();
    }

    protected function getIconPath()
    {
        return dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "browsers" . DIRECTORY_SEPARATOR . $this->browser->getInfo() . ".png";
    }

    public function getBase64()
    {
        if (!$this->browser->getInfo()) {
            return null;
        }

        $file = @file_get_contents(dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR
            . "browsers" . DIRECTORY_SEPARATOR . $this->browser->getInfo() . ".png");

        return base64_encode($file);

    }

}