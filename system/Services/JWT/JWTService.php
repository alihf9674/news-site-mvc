<?php

namespace System\Services\JWT;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTService extends JWT
{
    private static $key = 'news_site$TokenSecret1215#4548@thisSite487451';

    const HS256 = 'HS256';
    const HS384 = 'HS384';
    const HS512 = 'HS512';
    const RS256 = 'RS256';
    const RS384 = 'RS384';
    const RS512 = 'RS512';

    public static function JwtEncode($data): string
    {
        return parent::encode($data, self::$key, self::HS256);
    }

    public static function JwtDecode($jwt): \stdClass
    {
        return parent::decode($jwt, new Key(self::$key, self::HS256));
    }
}