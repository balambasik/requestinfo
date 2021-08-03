<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class Browser implements InfoInterface
{
    private $baseRequestInfo;

    public function __construct(BaseRequestInfo $baseRequestInfo)
    {
        $this->baseRequestInfo = $baseRequestInfo;
    }

    public function getInfo()
    {
        return $this->getBrowser();
    }

    protected function getBrowser()
    {
        if ($this->baseRequestInfo->isCrawler) {
            return 'unknown_browser';
        }

        if ($this->baseRequestInfo->deviceType == "tablet" || $this->baseRequestInfo->deviceType == "mobile") {
            if ($this->baseRequestInfo->mobileDetect->isChrome()) {
                return 'chrome_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isOpera()) {
                return 'opera_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isDolfin()) {
                return 'dolphin_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isFirefox()) {
                return 'firefox_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isUCBrowser()) {
                return 'uc_browser_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isPuffin()) {
                return 'puffin_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isSafari()) {
                return 'safari_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isEdge()) {
                return 'edge_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isIE()) {
                return 'ie_mobile';
            } elseif (preg_match('/.*(Linux;.*AppleWebKit.*Version\/\d+\.\d+.*Mobile).*/i', $this->baseRequestInfo->userAgent)) {
                return 'android_mobile';
            }
            return 'unknown_browser';

        } else {

            if (preg_match('/firefox/i', $this->baseRequestInfo->userAgent)) {
                return 'firefox_desktop';
            } elseif (preg_match('/opr|opera/i', $this->baseRequestInfo->userAgent)) {
                return 'opera_desktop';
            } elseif (preg_match('/edge/i', $this->baseRequestInfo->userAgent)) {
                return 'edge_desktop';
            } elseif (preg_match('/chrome/i', $this->baseRequestInfo->userAgent)) {
                return 'chrome_desktop';
            } elseif (preg_match('/maxthon/i', $this->baseRequestInfo->userAgent)) {
                return 'maxthon_desktop';
            } elseif (preg_match('/safari/i', $this->baseRequestInfo->userAgent)) {
                return 'safari_desktop';
            } elseif (preg_match('/msie|trident/i', $this->baseRequestInfo->userAgent)) {
                return 'ie_desktop';
            }

            return 'unknown_browser';
        }
    }


}