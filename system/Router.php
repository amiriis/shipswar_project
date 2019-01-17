<?php

class Router {
  public $_isRoute = FALSE ;
  public $_isUrlTure = FALSE ;

  public function get($route,$controlet_method){
    $_arg = array();
    $_url = array('');

    if(!empty($_GET['url'])) $_url = Helper::_url($_GET['url']);

    $_route = Helper::_url($route);

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
      if(count($_url) == count($_route)){
        for($i = 0 ; $i < count($_url) ; $i++) {
          if($_url[$i] == $_route[$i]){
            $this->_isUrlTure = TRUE;
          }
          else if(preg_match("/{(.*?)}/", $_route[$i])) {
            preg_match("/{(.*?)}/", $_route[$i] ,$temp);
            if(!empty($temp)){
              $_arg[] = array(
                $temp[1] => $_url[$i]
              );
            }
            $this->_isUrlTure = TRUE;
          }
          else {
            $this->_isUrlTure = FALSE;
            return FALSE;
          }
        }
      }
      else {
        $this->_isUrlTure = FALSE;
      }
    }
    else {
      $this->_isUrlTure = FALSE;
    }

    if($this->_isUrlTure){
      $_get = Helper::_array($controlet_method);
      Load::controller($_get[0],$_get[1],$_arg);
      $this->_isRoute = TRUE;
    }
  }

  public function post($route,$controlet_method){
    $_arg = array();
    $_arg_post = array();
    $_url = array('');

    if(!empty($_GET['url'])) $_url = Helper::_url($_GET['url']);
    if(!empty($_POST)) $_arg_post = $_POST;

    $_route = Helper::_url($route);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(count($_url) == count($_route)){
        for($i = 0 ; $i < count($_url) ; $i++) {
          if($_url[$i] == $_route[$i]){
            $this->_isUrlTure = TRUE;
          }
          else if(preg_match("/{(.*?)}/", $_route[$i])) {
            preg_match("/{(.*?)}/", $_route[$i] ,$temp);
            if(!empty($temp)){
              $_arg[] = array(
                $temp[1] => $_url[$i]
              );
            }
            $this->_isUrlTure = TRUE;
          }
          else {
            $this->_isUrlTure = FALSE;
            return FALSE;
          }
        }
      }
      else {
        $this->_isUrlTure = FALSE;
      }
    }
    else {
      $this->_isUrlTure = FALSE;
    }


    if($this->_isUrlTure){
      $_get = Helper::_array($controlet_method);
      Load::controller($_get[0],$_get[1],$_arg,$_arg_post);
      $this->_isRoute = TRUE;
    }
  }

  public function routing(){
    if(!$this->_isRoute){
      Errors::Not_Exist_Route();
      return FALSE;
    }
    return TRUE;
  }

}
