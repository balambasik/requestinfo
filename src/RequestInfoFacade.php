<?php

namespace Balambasik\RequestInfo;

/**
 * @method static \Balambasik\RequestInfo\RequestInfo all($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo ip($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo longIp($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo deviceType($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo deviceTypeIconPath($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo deviceTypeIconBase64($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo isCrawler($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo browser($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo browserIconPath($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo browserIconBase64($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo platform($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo platformIconPath($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo platformIconBase64($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo countryAlfa2($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo countryAlfa3($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo countryNumeric($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo countryName($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo countryFlagIconPath($userAgent = null, $ip = null)
 * @method static \Balambasik\RequestInfo\RequestInfo countryFlagIconBase64($userAgent = null, $ip = null)
 */
class RequestInfoFacade
{
    private static $instance;

    public static function __callStatic($methodName, $arguments)
    {
        $userAgent = $arguments[0] ?? null;
        $ip        = $arguments[1] ?? null;

        self::$instance = new \Balambasik\RequestInfo\RequestInfo($userAgent, $ip);

        if (method_exists(self::$instance, $methodName)) {
            return self::$instance->$methodName();
        } else {
            throw new \Exception("Method not exists!");
        }
    }

}