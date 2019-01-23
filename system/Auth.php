<?php

class Auth {

  function signIn($user_id, $role_id , $info = array()){
    Session::init();
    Session::set('user_isSignIn',TRUE);
    Session::set('user_id', $user_id);
    Session::set('user_role',$role_id);
    Session::set('user_info',$info);
  }

  function signOut(){
    Session::init();
    Session::unset('user_isSignIn');
    Session::unset('user_id');
    Session::unset('user_role');
  }

  function isSignIn(){
    Session::init();
    return Session::get('user_isSignIn');
  }

  function info(){
    Session::init();
    return Session::get('user_info');
  }

  function id(){
    Session::init();
    return Session::get('user_id');
  }
}
