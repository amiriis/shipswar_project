<?php

class Session {
  function init(){
    @session_start();
  }

  function set($key, $value){
    $_SESSION[$key] = $value;
  }

  function get($key){
    if(isset($_SESSION[$key])){
      return $_SESSION[$key];
    }
    else {
      return FALSE;
    }
  }

  function unset($key){
    if(isset($_SESSION[$key])){
      unset($_SESSION[$key]);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
