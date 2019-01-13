<?php

class routes {
  function __construct(){
    Router::get('1/2/3','amir@index');
    Router::get('test','mir/test@index');
    Router::get('/','index@index');
  }
}
