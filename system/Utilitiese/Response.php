<?php

namespace System\Response;

class Response
{
    private const HTTP_OK = 200;
    private const HTTP_NOT_FOUND = 404;
    private const HTTP_METHOD_NOT_ALLOWED = 405;
    private const INTERNAL_SERVER_ERROR = 500;

    private const STATUS = [
        200 => 'OK',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error',
    ];

    public static function setHeaders($status_code = self::HTTP_OK)
    {
        header("Content-Type: application/json; charset=UTF-8");
    }

    public static function response($data, $status_code = self::HTTP_OK)
    {
        self::setHeaders($status_code);
        $response = array(
            'http_status' => $status_code,
            'http_message' => self::STATUS[$status_code],
            'data' => $data
        );
        return json_encode($response);
    }
}