<?php

class Load{
  private $this_controller = null;
  private $_output = null;

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

  function controller($name, $method,$args = array(),$args_post = array()){
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

      if(!method_exists($_controller,$method)){
        Errors::Not_Exist_Function($method);
        return FALSE;
      }


      foreach ($args as $arg) {
        foreach ($arg as $key => $value) {
          $_controller->args()->$key = $value;
        }
      }

      foreach ($args_post as $key => $value) {
        $_controller->post()->$key = $value;
      }

      $_controller->post = $args_post;

      return call_user_func(array($_controller,$method));

    }
    else {
      Errors::Not_Exist_Controller();
      return FALSE;
    }
  }

  function view($name, $data = array()) {

    $data['URL_JS'] = URL_JS;
    $data['URL_CSS'] = URL_CSS;
    $data['URL_IMAGE'] = URL_IMAGE;
    $data['SITE_NAME'] = SITE_NAME;

    require_once SITE_DIR . 'vendor/autoload.php';

    $loader = new Twig_Loader_Filesystem(SITE_DIR . 'views');
    $twig = new Twig_Environment($loader, [
      'debug' => true,
      'cache' => SITE_DIR . 'cache/dev/twig',
    ]);

    $twig->addExtension(new Twig_Extension_Debug());

    ob_start();

    echo $twig->render($name,$data);

    $this->_output = ob_get_contents();

    ob_end_clean();

    return $this->_output;
  }

  function output(){
    if($this->_output != null){
      echo $this->_output;
    }
  }
}
