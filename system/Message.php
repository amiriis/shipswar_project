<?php

class Message{
  function set($name, $message){
    Session::init();
    Session::set($name, $message);
  }

  function get($name){
    if(Session::get($name)){
      Session::init();
      $message = Session::get($name);
      return $message;
    }
  }

  function unset($name){
    Session::init();
    Session::unset($name);
  }
}
