<?php

class View {
  function __construct(){
  }

  public function render($name, $data = array(), $show = 1) {
    extract($data);

    if ($show == 1) {
      require 'views/' . $name . '.php';
    } elseif ($show == 2) {
      require 'views/' . $name . '.php';
    }
  }
}
