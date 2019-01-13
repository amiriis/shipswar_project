<?php

class Controller {

  function __construct(){
    $this->load = new Load($this);
  }

}
