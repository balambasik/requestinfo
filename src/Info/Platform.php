<?php

namespace Balambasik\RequestInfo\Info;

use Balambasik\RequestInfo\BaseRequestInfo;
use Balambasik\RequestInfo\Interfaces\InfoInterface;

class Platform implements InfoInterface
{
    private $baseRequestInfo;

    public function __construct(BaseRequestInfo $baseRequestInfo)
    {
        $this->baseRequestInfo = $baseRequestInfo;
    }

    public function getInfo()
    {
        return $this->getPlatform();
    }

    protected function getPlatform()
    {
        if ($this->baseRequestInfo->isCrawler) {
            return 'unknown_platform';
        }

        if ($this->baseRequestInfo->deviceType == "tablet" || $this->baseRequestInfo->deviceType == "mobile") {
            if ($this->baseRequestInfo->mobileDetect->isIOS()) {
                return 'ios';
            } elseif ($this->baseRequestInfo->mobileDetect->isAndroidOS()) {
                return 'android';
            } elseif ($this->baseRequestInfo->mobileDetect->isSymbianOS()) {
                return 'symbian';
            } elseif ($this->baseRequestInfo->mobileDetect->isBlackBerryOS()) {
                return 'black_berry';
            } elseif ($this->baseRequestInfo->mobileDetect->isWindowsMobileOS()) {
                return 'windows_mobile';
            } elseif ($this->baseRequestInfo->mobileDetect->isWindowsPhoneOS()) {
                return 'windows_phone';
            }

            return 'unknown_platform';
        } else {
            if (preg_match('/windows nt 10/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_10';
            } elseif (preg_match('/windows nt 6\.3/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_8_1';
            } elseif (preg_match('/windows nt 6\.2/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_8';
            } elseif (preg_match('/windows nt 6\.1/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_7';
            } elseif (preg_match('/windows nt 5\.2/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_server';
            } elseif (preg_match('/windows nt 5\.1|windows xp/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_xp';
            } elseif (preg_match('/windows nt 5\.0/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_2000';
            } elseif (preg_match('/windows me/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_me';
            } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $this->baseRequestInfo->userAgent)) {
                return 'mac_os';
            } elseif (preg_match('/ubuntu/i', $this->baseRequestInfo->userAgent)) {
                return 'ubuntu';
            } elseif (preg_match('/linux/i', $this->baseRequestInfo->userAgent)) {
                return 'linux';
            } elseif (preg_match('/windows nt 6\.0/i', $this->baseRequestInfo->userAgent)) {
                return 'windows_vista';
            }

            return 'unknown_platform';
        }
    }


}