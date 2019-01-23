<?php

class ControllerAuth extends Controller {

  function signIn(){
    if(Auth::isSignIn()) Router::url(Server::_ref());
    
    $this->data['ref'] = Server::_ref();
    $this->output($this->load->view('auth/signIn.twig',$this->data));
  }

  function signUp(){
    if(Auth::isSignIn()) Router::url(Server::_ref());

    $this->data['ref'] = Server::_ref();
    $this->output($this->load->view('auth/signUp.twig',$this->data));
  }

  function signOut(){
    if(Auth::isSignIn()){
      Auth::signOut();
    }
    Router::url(Server::_ref());
  }

  function getUser(){
    $this->load->model('auth');
    $user = $this->model_auth->signIn($this->post()->username, $this->post()->password);
    if($user){
      $info = $this->model_auth->getInfo($user['user_id']);
      Auth::signIn($user['user_id'], $user['role_id'], $info);
      Router::url($this->post()->ref);
    }
  }

  function setUser(){
    $this->load->model('auth');
    if($this->model_auth->signUp($this->post()->username, $this->post()->password, $this->post()->nickname,$this->post()->email)){
      Router::url($this->post()->ref);
    }
  }

}
