<?php

namespace Balambasik\RequestInfo;

use Detection\MobileDetect;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class BaseRequestInfo
{
    public $mobileDetect;
    public $crawlerDetect;

    public $userAgent;
    public $ip;
    public $deviceType;
    public $isCrawler;
    public $sypexGeo;


    public function __construct($userAgent = "", $ip = "")
    {
        $this->userAgent = $userAgent ? $userAgent : ($_SERVER["HTTP_USER_AGENT"] ?? "");
        $this->ip        = $ip ? $ip : $this->getRealIp();

        $this->mobileDetect = new MobileDetect();
        $this->mobileDetect->setUserAgent($this->userAgent);
        $this->crawlerDetect = new CrawlerDetect();

        $sypexGeoDbFile =  dirname(__FILE__) . "/SypexDB/SxGeo.dat";

        if (!file_exists($sypexGeoDbFile)) {
            throw new \Exception("SypexGeo database file - not exists!");
        }

        $this->sypexGeo = new SxGeo($sypexGeoDbFile);

        $this->deviceType = $this->getDeviceType();
        $this->isCrawler  = $this->crawlerDetect->isCrawler($this->userAgent);
    }


    public function getRealIp()
    {
        $clients = [
            isset($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : '',
            isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '',
            isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '',
            isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''
        ];

        foreach ($clients as $raw_ip) {
            $ip_list   = explode(',', $raw_ip);
            $client_ip = trim(end($ip_list));

            if (filter_var($client_ip, FILTER_VALIDATE_IP)) {
                return $client_ip;
            }
        }

        return '0.0.0.0';

    }

    public function getDeviceType()
    {
        if ($this->mobileDetect->isMobile()) {
            return "mobile";
        }

        if ($this->mobileDetect->isTablet()) {
            return "tablet";
        }

        return "desktop";
    }

}