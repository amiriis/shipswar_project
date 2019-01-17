<?php

class routes extends Router{
  function __construct(){
    Router::get("/","index@index");
    Router::get("game/{id}","games@index");
    Router::get("test","mir/test@index");
    Router::post("test","mir/test@host");
    Router::post("amir","mir/test@index");

    $this->routing();
  }
}
