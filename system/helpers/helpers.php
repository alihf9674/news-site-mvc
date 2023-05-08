<?php
function dd($var)
{
    echo "<pre>";
    var_dump($var);
    exit;
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

function getCurrentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}

function convertToJalaliDate($date): string
{
    return \Morilog\Jalali\Jalalian::forge($date)->format('%A, %d %B %Y H:i:s');
}

function flash($name, $message = null)
{
    if (!is_null($message))
        $_SESSION['flash'][$name] = $message;
    if (!isset($_SESSION['temporary_flash'][$name]))
        return false;
    $temporary_flash = $_SESSION['temporary_flash'][$name];
    unset($_SESSION['temporary_flash'][$name]);
    return $temporary_flash;
}

function error($name, $message = null)
{
    if (!is_null($message))
        $_SESSION['error_flash'][$name] = $message;
    if (!isset($_SESSION['temporary_error_flash'][$name]))
        return false;
    $temporary_error_flash = $_SESSION['temporary_error_flash'][$name];
    unset($_SESSION['temporary_error_flash'][$name]);
    return $temporary_error_flash;
}

function successfullyMessage($message)
{
    return '<div class="mb-2 alert alert-success"><small class="form-text text-success">' . $message . '</small></div>';
}

function failedMessage($message): string
{
    return '<div class="mb-2 alert alert-danger"><small class="form-text text-danger">' . $message . '</small></div>';
}

function isValidInput($input, array $reserved_input): bool
{
    foreach ($input as $key => $value) {
        if (!in_array($key, $reserved_input))
            return false;
    }
    return true;
}

// it prevents invalid data from being stored
function validateFormData($data, array $skip_validation = null): array
{
    $newDataArray = array();
    foreach ($data as $key => $value) {
        if (!is_null($skip_validation) && in_array($value, $skip_validation))
            $newDataArray[$key] = $value;
        else {
            $safeData = stripslashes(trim($value));
            $newDataArray[$key] = $safeData;
        }
    }
    return $newDataArray;
}