<?php
function dd($var)
{
    echo "<pre>";
    var_dump($var);
    exit;
}

function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{
    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
    $currentUrl = trim($currentUrl, '/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved Url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($currentUrlArray) != sizeof($reservedUrlArray) || methodField() != $requestMethod)
        return false;
    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if (
            $reservedUrlArray[$key][0] == "{"
            and $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == "}"
        ) {
            array_push($parameters, $currentUrlArray[$key]);
        } elseif ($currentUrlArray[$key] !== $reservedUrlArray[$key]) {
            return false;
        }
    }

    if (methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    $object = new $class;
    call_user_func_array(array($object, $method), $parameters);
    exit();
}

function url($url): string
{
    return trim(CURRENT_DOMAIN, '/') . DIRECTORY_SEPARATOR . trim($url, '/');
}

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') == true ? 'https://' : 'http://';
}

function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}

function ifUserPhoneNumberRegEx($phoneNumber): bool
{
    if (isset($phoneNumber)) {
        return preg_match('/^[0-9]{10}+$/', $phoneNumber);
    }
    return false;
}

function convertToJalaliDate($date): string
{
    return \Morilog\Jalali\Jalalian::forge($date)->format('%A, %d %B %Y H:i:s');
}