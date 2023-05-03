<?php

namespace System\Router\Web;

use System\Traits\HastMethodCaller;

class Routing
{
    use HastMethodCaller;

    private $currentUrl = null;
    private $reservedUrl = null;
    private $requestMethod;
    private $parameters = [];

    public function uriMethod($reserved_url, $class, $method, $request_method = 'GET')
    {
        $this->validateReservedUrl($reserved_url);
        $this->validateCurrentUrl();
        $this->setRequestMethod();
        if (!$this->compareUrl() || !$this->compareRequestMethod($this->requestMethod))
            return false;
            for ($key = 0; $key < sizeof($this->currentUrl); $key++) {
        if (
            $this->reservedUrl[$key][0] == "{"
            and $this->reservedUrl[$key][strlen($this->reservedUrl[$key]) - 1] == "}"
        ) {
            $this->setParameters($this->currentUrl[$key]);
        } elseif ($this->currentUrl[$key] !== $this->reservedUrl[$key]) {
            return false;
        }
    }
        if ($request_method == 'POST') {
            $request = isset($_FILES) ? array_merge($_FILES, $_POST) : $_POST;
            $this->parameters = array_merge([$request], $this->parameters);
        }
        $object = new $class;
        call_user_func_array(array($object, $method), $this->parameters);
        exit();
    }

    private function setParameters($parameters)
    {
        array_push($this->parameters, $parameters);
    }

    private function setRequestMethod()
    {
        $this->requestMethod = methodField();
    }

    private function getCurrentUrl(): string
    {
        return getCurrentUrl();
    }

    private function setCurrentUrl($current_url_array)
    {
        $this->currentUrl = $current_url_array;
    }

    private function setReservedUrl($reserved_url_array)
    {
        $this->reservedUrl = $reserved_url_array;
    }

    private function compareUrl(): bool
    {
        if (sizeof($this->reservedUrl) != sizeof($this->currentUrl))
            return false;
        return true;
    }

    private function compareRequestMethod($requestMethod): bool
    {
        if ($requestMethod != $this->requestMethod)
            return false;
        return true;
    }

    private function validateCurrentUrl()
    {
        $currentUrl = $this->getCurrentUrl();
        $currentUrl = str_replace(CURRENT_DOMAIN, '', $currentUrl);
        $currentUrl = trim($currentUrl, '/');
        $currentUrlArray = explode('/', $currentUrl);
        $currentUrlArray = array_filter($currentUrlArray);
        $this->setCurrentUrl($currentUrlArray);
    }

    private function validateReservedUrl($reserved_url)
    {
        $reservedUrl = trim($reserved_url, '/');
        $reservedUrlArray = explode('/', $reservedUrl);
        $reservedUrlArray = array_filter($reservedUrlArray);
        $this->setReservedUrl($reservedUrlArray);
    }
}