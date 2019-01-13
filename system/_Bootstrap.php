<?php

class Bootstrap {
  private $_url = null;
  private $_controller = null;
  private $_controllerPath = 'controllers/';
  private $_modelPath = 'models/';
  private $_errorFile = 'errors.php';
  private $_defaultFile = 'index';


  public function init() {
    $this->_geturl();
    $this->error();

    if (empty($this->_url[0])) {
        $this->_loadDefaultController();
        return FALSE;
    }

    if($this->_loadExistingController()){
      $this->ControllerMethod();
    }
  }

  private function ControllerMethod() {
    $length = count($this->_url);
    if ($length > 1) {
      if (!method_exists($this->_controller, $this->_url[1])) {
        $this->_error->Not_Exist_Function();
        return FALSE;
      }
    }
    switch ($length) {
      case 5:
        $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
        break;
      case 4:
        $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
        break;
      case 3:
        $this->_controller->{$this->_url[1]}($this->_url[2]);
        break;
      case 2:
        $this->_controller->{$this->_url[1]}();
        break;
      default :
        if (!method_exists($this->_controller,'index')) {
          $this->_error->Not_Exist_Function();
          return FALSE;
        }
        $this->_controller->Index();
        break;
    }
  }

  private function _geturl() {
    $url = isset($_GET['url']) ? $_GET['url'] : NULL;
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $this->_url = explode('/', $url);
  }

  private function _loadDefaultController() {
    require $this->_controllerPath . $this->_defaultFile . '.php';
    $defaultFile_name = 'Controller' . ucwords($this->_defaultFile);
    $this->_controller = new $defaultFile_name();
    $this->_controller->Index();
  }

  private function _loadExistingController() {

    $controller_name = 'Controller' . ucwords($this->_url[0]);

    $path = $this->_controllerPath . $this->_url[0] . '.php';
    if (file_exists($path)) {
      require $path;
      $this->_controller = new $controller_name();
      return TRUE;
    } else {
      $this->_error->Not_Exist_Controller();
      return FALSE;
    }
  }

  public function error() {
    require $this->_controllerPath . $this->_errorFile;
    $this->_error = new errors();
    return FALSE;
  }
}
