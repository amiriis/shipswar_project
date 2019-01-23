<?php

class routes extends Router{
  function __construct(){
    Router::get("/","index@index");

    Router::get("wars","war@wars");
    Router::get("wars/requestfight/{id}","war@requestFight");
    Router::get("wars/cancelrequestfight/{id}","war@cancelRequestFight");

    // Auth route
    Router::get("signin","auth@signIn");
    Router::get("signout","auth@signOut");
    Router::get("signup","auth@signUp");
    Router::post("signin","auth@getUser");
    Router::post("signup","auth@setUser");

    $this->routing();
  }
}
