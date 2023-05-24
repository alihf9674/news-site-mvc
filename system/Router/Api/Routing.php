<?php

namespace System\Router\Api;

use System\Traits\HasMethodCaller;

class Routing
{
    use HasMethodCaller;

    private $currentUrl = null;
    private $reservedUrl = null;
    private $requestMethod;
    private $parameters = [];

    public function uriMethod($reserved_url, $class, $method)
    {
        $this->validateReservedUrl($reserved_url);
        $this->validateCurrentUrl();
        $this->setRequestMethod();
        if (!$this->compareUrl())
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
        if ($this->requestMethod == 'post') {
            $request = $_POST;
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
        $requestMethod = strtolower(methodField());
        if ($requestMethod == 'post') {
            if (isset($_POST['_method'])) {
                if ($_POST['_method'] == 'put')
                    $requestMethod = 'put';
                elseif ($_POST['_method'] == 'delete')
                    $requestMethod = 'delete';
            }
        }
        $this->requestMethod = $requestMethod;
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