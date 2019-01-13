<?php

function __autoload($classname){
  if(file_exists("system/$classname.php")){
    require "system/$classname.php";
  }
  else if(file_exists("$classname.php")){
    require "$classname.php";
  }
}

require 'config.php';

$Route = new routes();
