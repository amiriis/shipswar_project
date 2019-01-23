<?php

class Controller {
  public $data = array();
  public $load = null;
  function __construct(){
    if(Auth::isSignIn()) {
      $this->data['isSignIn'] = TRUE;
      $this->data['user_info'] = Auth::info();
    }
    $this->load = new Load($this);
    $this->message = new Message();
  }

  function args(){
    return $this;
  }

  function post(){
    return $this;
  }

  function output($view){
    echo $view;
  }

}
