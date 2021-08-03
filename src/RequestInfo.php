<?php

namespace Balambasik\RequestInfo;

use Balambasik\RequestInfo\Info\Browser;
use Balambasik\RequestInfo\Info\BrowserIconPath;
use Balambasik\RequestInfo\Info\CountryAlfa2;
use Balambasik\RequestInfo\Info\CountryAlfa3;
use Balambasik\RequestInfo\Info\CountryFlagIconPath;
use Balambasik\RequestInfo\Info\CountryName;
use Balambasik\RequestInfo\Info\CountryNumeric;
use Balambasik\RequestInfo\Info\DeviceType;
use Balambasik\RequestInfo\Info\DeviceTypeIconPath;
use Balambasik\RequestInfo\Info\Ip;
use Balambasik\RequestInfo\Info\IsCrawler;
use Balambasik\RequestInfo\Info\LongIp;
use Balambasik\RequestInfo\Info\Platform;
use Balambasik\RequestInfo\Info\PlatformIconPath;

class RequestInfo
{
    private $baseRequestInfo;

    private $platform;
    private $platformIconPath;
    private $browser;
    private $browserIconPath;
    private $deviceType;
    private $deviceTypeIconPath;
    private $ip;
    private $longIp;
    private $isCrawler;
    private $countryAlfa2;
    private $countryAlfa3;
    private $countryNumeric;
    private $countryName;
    private $countryFlagIconPath;

    public function __construct($userAgent = "", $clientIp = "")
    {
        $this->baseRequestInfo = new BaseRequestInfo($userAgent, $clientIp);
    }

    public function all()
    {
        return (object) [
            "useragent"             => $this->baseRequestInfo->userAgent,
            "ip"                    => $this->ip(),
            "longIp"                => $this->longIp(),
            "deviceType"            => $this->deviceType(),
            "deviceTypeIconPath"    => $this->deviceTypeIconPath(),
            "deviceTypeIconBase64"  => $this->deviceTypeIconBase64(),
            "isCrawler"             => $this->isCrawler(),
            "platform"              => $this->platform(),
            "platformIconPath"      => $this->platformIconPath(),
            "platformIconBase64"    => $this->platformIconBase64(),
            "browser"               => $this->browser(),
            "browserIconPath"       => $this->browserIconPath(),
            "browserIconBase64"     => $this->browserIconBase64(),
            "countryAlfa2"          => $this->countryAlfa2(),
            "countryAlfa3"          => $this->countryAlfa3(),
            "countryNumeric"        => $this->countryNumeric(),
            "countryName"           => $this->countryName(),
            "countryFlagIconPath"   => $this->countryFlagIconPath(),
            "countryFlagIconBase64" => $this->countryFlagIconBase64(),
        ];
    }

    public function ip()
    {
        if (!$this->ip) {
            $this->ip = new Ip($this->baseRequestInfo);
        }

        return $this->ip->getInfo();
    }

    public function longIp()
    {
        if (!$this->longIp) {
            $this->longIp = new LongIp($this->baseRequestInfo, $this->baseRequestInfo->ip);
        }

        return $this->longIp->getInfo();
    }

    public function deviceType()
    {
        if (!$this->deviceType) {
            $this->deviceType = new DeviceType($this->baseRequestInfo);
        }

        return $this->deviceType->getInfo();
    }

    public function deviceTypeIconPath()
    {
        if (!$this->deviceTypeIconPath) {

            if (!$this->deviceType) {
                $this->deviceType = new DeviceType($this->baseRequestInfo);
            }

            $this->deviceTypeIconPath = new DeviceTypeIconPath($this->deviceType);
        }

        return $this->deviceTypeIconPath->getInfo();
    }

    public function deviceTypeIconBase64()
    {
        if (!$this->deviceTypeIconPath) {

            if (!$this->deviceType) {
                $this->deviceType = new DeviceType($this->baseRequestInfo);
            }

            $this->deviceTypeIconPath = new DeviceTypeIconPath($this->deviceType);
        }

        return $this->deviceTypeIconPath->getBase64();
    }

    public function isCrawler()
    {
        if (!$this->isCrawler) {
            $this->isCrawler = new IsCrawler($this->baseRequestInfo);
        }

        return $this->isCrawler->getInfo();
    }

    public function browser()
    {
        if (!$this->browser) {
            $this->browser = new Browser($this->baseRequestInfo);
        }

        return $this->browser->getInfo();
    }

    public function browserIconPath()
    {
        if (!$this->browserIconPath) {

            if (!$this->browser) {
                $this->browser = new Browser($this->baseRequestInfo);
            }

            $this->browserIconPath = new BrowserIconPath($this->browser);
        }

        return $this->browserIconPath->getInfo();
    }

    public function browserIconBase64()
    {
        if (!$this->browserIconPath) {

            if (!$this->browser) {
                $this->browser = new Browser($this->baseRequestInfo);
            }

            $this->browserIconPath = new BrowserIconPath($this->browser);
        }

        return $this->browserIconPath->getBase64();
    }

    public function platform()
    {
        if (!$this->platform) {
            $this->platform = new Platform($this->baseRequestInfo);
        }

        return $this->platform->getInfo();
    }

    public function platformIconPath()
    {
        if (!$this->platformIconPath) {

            if (!$this->platform) {
                $this->platform = new Platform($this->baseRequestInfo);
            }

            $this->platformIconPath = new PlatformIconPath($this->platform);
        }

        return $this->platformIconPath->getInfo();
    }

    public function platformIconBase64()
    {
        if (!$this->platformIconPath) {

            if (!$this->platform) {
                $this->platform = new Platform($this->baseRequestInfo);
            }

            $this->platformIconPath = new PlatformIconPath($this->platform);
        }

        return $this->platformIconPath->getBase64();
    }

    public function countryAlfa2()
    {
        if (!$this->countryAlfa2) {
            $this->countryAlfa2 = new CountryAlfa2($this->baseRequestInfo);
        }

        return $this->countryAlfa2->getInfo();
    }

    public function countryAlfa3()
    {
        if (!$this->countryAlfa3) {

            if (!$this->countryAlfa2) {
                $this->countryAlfa2 = new CountryAlfa2($this->baseRequestInfo);
            }

            $this->countryAlfa3 = new CountryAlfa3($this->countryAlfa2);
        }

        return $this->countryAlfa3->getInfo();
    }

    public function countryNumeric()
    {
        if (!$this->countryNumeric) {

            if (!$this->countryAlfa2) {
                $this->countryAlfa2 = new CountryAlfa2($this->baseRequestInfo);
            }

            $this->countryNumeric = new CountryNumeric($this->countryAlfa2);
        }

        return $this->countryNumeric->getInfo();
    }

    public function countryName()
    {
        if (!$this->countryName) {

            if (!$this->countryAlfa2) {
                $this->countryAlfa2 = new CountryAlfa2($this->baseRequestInfo);
            }

            $this->countryName = new CountryName($this->countryAlfa2);
        }

        return $this->countryName->getInfo();
    }

    public function countryFlagIconPath()
    {
        if (!$this->countryFlagIconPath) {

            if (!$this->countryAlfa2) {
                $this->countryAlfa2 = new CountryAlfa2($this->baseRequestInfo);
            }

            $this->countryFlagIconPath = new CountryFlagIconPath($this->countryAlfa2);
        }

        return $this->countryFlagIconPath->getInfo();
    }

    public function countryFlagIconBase64()
    {
        if (!$this->countryFlagIconBase64) {

            if (!$this->countryAlfa2) {
                $this->countryAlfa2 = new CountryAlfa2($this->baseRequestInfo);
            }

            $this->countryFlagIconPath = new CountryFlagIconPath($this->countryAlfa2);
        }

        return $this->countryFlagIconPath->getBase64();
    }

}