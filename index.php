<?php

function __autoload($class){

 require "system/$class.php";

}

require 'config.php';


/**
 * Optional name folders
 */
$app = new Bootstrap();
$app->init();
