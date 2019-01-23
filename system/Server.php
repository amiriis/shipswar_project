<?php

class Server {
  function _ref(){
    Session::init();
    if(isset($_SERVER['HTTP_REFERER'])){
      if($_SERVER['HTTP_REFERER'] == Server::_here()){
        if(Session::get('_ref')){
          return Session::get('_ref');
        }
        else {
          return URL;
        }
      }
      Session::set('_ref',$_SERVER['HTTP_REFERER']);
      return $_SERVER['HTTP_REFERER'];
    }
    elseif(Session::get('_ref')){
      return Session::get('_ref');
    }
    else {
      return URL;
    }
  }

  function _here(){
    $_next = $_SERVER['REQUEST_URI'];
    $_urt = URL . '/' . substr($_next,strlen(SITE_URL));
    return $_urt;
  }

}
