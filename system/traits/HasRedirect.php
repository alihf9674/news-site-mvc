<?php

namespace System\Traits;

trait HasRedirect
{
      protected function redirect($url)
      {  
            header("location:" . protocol() .$_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR . 'mvc-site' . DIRECTORY_SEPARATOR . $url);
      }

      protected function back()
      {
            $phpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
            if(!is_null($phpReferer)) {
                  header("Location: " . $phpReferer);
            } else {
                  echo "Error: Route not found: " . $phpReferer;
            }
      }
}
