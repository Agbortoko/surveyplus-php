<?php

namespace Surveyplus\App\Config;

class App
{

    /** @var string $baseUrl The base url of the website */
    private static string $baseUrl = "http://localhost/surveyplusweb";


    /** @var string $baseUrlSegment The segment directly after the base url */
    private static string $baseUrlSegment = "surveyplusweb";


    /** @var string $senderEmail Email Indicated as sender when emails are sent */
    private static string $senderEmail = "no-reply@email.com";


    public static function getBaseUrl()
    {
        return self::$baseUrl;
    }


    public static function getBaseUrlSegment()
    {
        return self::$baseUrlSegment;
    }


    public static function getSenderEmail()
    {
        return self::$senderEmail;
    }



}
