<?php

namespace System\Traits;

trait HasView
{
      protected function view($dir, $vars = null)
      {
            $dir = str_replace('.', '/', $dir);
            if ($vars)
                  extract($vars);

            $path = BASE_PATH . "/application/view/" . $dir . ".php";
            if (file_exists($path)) return require_once $path;
            else echo "Could not find {$dir}";
      }

      protected function asset($dir)
      {
            return trim(CURRENT_DOMAIN, '/') . '/' . trim($dir, '/');
      }

      protected function include($dir, $vars = null)
      {
            $dir = str_replace('.', '/', $dir);
            if ($vars)
                  extract($vars);

            $path = BASE_PATH . "/application/view/" . $dir . ".php";
            if (file_exists($path)) return require_once $path;
            else echo "Could not find {$dir}";
      }

      protected function url($url)
      {
            $domain = trim(CURRENT_DOMAIN, '/');
            $src = $domain . '/' . trim($url, '/');
            return $src;     
      }
}
