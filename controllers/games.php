<?php

class ControllerGames extends Controller {
  function index(){
    echo "this page games";

    echo $this->args()->id;
  }
}
