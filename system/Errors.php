<?php

class Errors{
  function Not_Exist_Controller($name){
    echo "'". $name . "' controller is not exist!";
  }

  function Not_Exist_Function($name){
    echo "'". $name . "' function is not exist!";
  }

  function Not_Exist_Route(){
    echo "route is not exist!";
  }
}
