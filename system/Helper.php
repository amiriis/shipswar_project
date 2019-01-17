<?php

class Helper {

  function _url($__url){
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

  function _pr($array = array()){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
  }
}
