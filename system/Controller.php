<?php

class Controller {

  function __construct(){
    $this->load = new Load($this);
  }

  function args(){
    return $this;
  }

  function post(){
    return $this;
  }

}
