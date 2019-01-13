<?php

class Router {

  public function get($route,$controlet_method){
    $_url = array('');

    if(!empty($_GET['url'])) $_url = Bootstrap::url($_GET['url']);

    $_route = Bootstrap::url($route);

    if($_url == $_route){
      $_get = Bootstrap::_array($controlet_method);
      Load::controller($_get[0],$_get[1]);
    }

  }
}
