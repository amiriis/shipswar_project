<?php

class Bootstrap {

  function url($__url){
    $url = isset($__url) ? $__url : NULL;
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    return explode('/', $url);
  }

  function _array($__string){
    $url = isset($__string) ? $__string : NULL;
    $url = rtrim($__string, '@');
    return explode('@', $url);
  }
}
