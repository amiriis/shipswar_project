<?php

class Useraccess {

  function figherlogin($route){
    if(Auth::isSignIn()){
      return TRUE;
    }
    Session::init();
    Session::set('_ref', Server::_here());
    Router::redirect($route);
  }
}
