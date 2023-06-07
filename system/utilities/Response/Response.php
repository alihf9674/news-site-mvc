<?php

namespace System\Utilities\Response;

class Response extends Header
{
    public static function response($data, $status_code = parent::HTTP_OK)
    {
        parent::setHeaders($status_code);
        return json_encode(['data' => $data]);
    }
}