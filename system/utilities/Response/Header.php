<?php

namespace System\Utilities\Response;

class Header
{
    const STATUS = [
        200 => 'OK',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error'
    ];
    public const HTTP_OK = 200;
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_METHOD_NOT_ALLOWED = 405;
    public const INTERNAL_SERVER_ERROR = 500;

    public static function setHeaders($status_code)
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET,POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        header("HTTP/1.1 $status_code " . self::STATUS[$status_code]);
    }
}