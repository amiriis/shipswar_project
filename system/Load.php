<?php

class Load{
  private $this_controller = null;

  function __construct($controller){
    $this->this_controller = $controller;
  }

  function model($name){
    $path = 'models/' . $name . '.php';
    if (file_exists($path)) {
      require $path;
      $_modelname = explode('/', $name);
      $_modelClass = 'Model';
      $_model = 'model';
      foreach ($_modelname as $isName) {
        $_modelClass .= ucwords($isName);
        $_model .= '_' . $isName;
      }

      $this->this_controller->$_model = new $_modelClass;
    }
  }

  function controller($name, $method){
    $path = 'controllers/' . $name . '.php';
    if (file_exists($path)) {
      require $path;
      $_controllerName = explode('/', $name);
      $_controllerClass = 'Controller';
      $_controller = null;
      foreach ($_controllerName as $isName) {
        $_controllerClass .= ucwords($isName);
      }

      $_controller = new $_controllerClass;

      return call_user_func(array($_controller,$method));
    }
  }

  function view($name, $data = array()) {
    extract($data);
    require 'views/' . $name . '.php';
  }
}
