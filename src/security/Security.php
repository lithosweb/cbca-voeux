<?php
namespace v\security;


/**
 * The main Security Class for the app
 */
class Security
{
    public static function apiHeaders()
    {
        // API headers
        header("Accept: application/json; charset=UTF-8");
        header("content-type: application/json");
        header("content: application/json");
    }

    public static function responseHeaders()
    {
        // Response headers
        header("X-Powered-By: Fabulous Labs");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Pragma: no-cache");
    }

    public static function requestHeaders()
    {
        // Requets headers
        header("Accept: text/html; charset=UTF-8");
        header("Accept-Encoding: gzip, deflate, br");
        header("Accept-Language: en-US,en;q=0.9,fr-FR;q=0.8,fr;q=0.7");
        header("Cache-Control:max-age=0");
        header("Connection: keep-alive");
        header("Host:localhost:1000");
        header("Sec-Ch-Ua-Mobile: ?0");
        header("Sec-Ch-Ua-Platform: Fabulous Labs");
        header("Sec-Fetch-Dest: document");
        header("Sec-Fetch-Mode: navigate");
        header("User-Agent: Fabrice Kulhe");
        header("Upgrade-Insecure-Requests: 1");
        header("Sec-Fetch-User: ?1");
        header("Sec-Fetch-Site: same-origin");
    }
}
