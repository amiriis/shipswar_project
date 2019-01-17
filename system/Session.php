<?php

class Session {
  function static init(){
    @session_start();
  }

  function static set($key, $value){
    $_SESSION[$key] = $value;
  }

  function static get($key){
    if(isset($_SESSION[$key])){
      return $_SESSION[$key];
    }
    else {
      return FALSE;
    }
  }

  function static unset($key){
    if(isset($_SESSION[$key])){
      unset($_SESSION[$key]);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
