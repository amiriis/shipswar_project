<?php

class ControllerWar extends Controller {

  function wars(){
    Useraccess::figherlogin('signin');

    if($this->message->get('success_request')){
      $this->data['success'][] = $this->message->get('success_request');
      $this->message->unset('success_request');
    }
    if($this->message->get('success_cancel_request')){
      $this->data['success'][] = $this->message->get('success_cancel_request');
      $this->message->unset('success_cancel_request');
    }
    if($this->message->get('error_request')){
      $this->data['error'][] = $this->message->get('error_request');
      $this->message->unset('error_request');
    }
    if($this->message->get('error_validateRequest')){
      $this->data['error'][] = $this->message->get('error_validateRequest');
      $this->message->unset('error_validateRequest');
    }

    $this->load->model('war');

    $users = $this->model_war->getUsers(Auth::id());

    foreach ($users as $user) {
      $status = '';
      $requestFrom = $this->model_war->getRequest($user['user_id'], Auth::id());
      $requestFor = $this->model_war->getRequest(Auth::id(),$user['user_id']);
      if($requestFrom){
        switch ($requestFrom['status']) {
          case '1':
            $status = 'waiting';
            break;
          case '0':
            $status = 'canceled';
            break;
          case '-1':
            $status = 'rejected';
            break;
        }
        $this->data['requestFrom'][] = array(
          'id'      =>  $user['user_id'],
          'name'    =>  $user['name'],
          'status'  =>  $status,
        );
      }
      elseif($requestFor){
        switch ($requestFor['status']) {
          case '1':
            $status = 'Waiting for you';
            break;
          case '-1':
            $status = 'canceled';
            break;
        }
        $this->data['requestFor'][] = array(
          'id'      =>  $user['user_id'],
          'name'    =>  $user['name'],
          'status'  =>  $status,
        );
      }
      else {
        $this->data['users'][] = array(
          'id'      =>  $user['user_id'],
          'name'    =>  $user['name'],
        );
      }
    }
    $this->output($this->load->view('war/wars.twig', $this->data));
  }

  function requestFight(){
    Useraccess::figherlogin('signin');

    $this->load->model('war');

    if($this->validateRequest()){
        if($this->model_war->setRequestFight($this->args()->id, Auth::id())){
          $this->message->set('success_request','Your request has been sent!');
          Router::redirect('wars');
        }
        else {
          $this->message->set('error_request','request error!');
          Router::redirect('wars');
        }
    }
    else {
      Router::redirect('wars');
    }
  }

  function cancelRequestFight(){
    Useraccess::figherlogin('signin');

    $this->load->model('war');

    if($this->validateCancelRequest()){
      if($this->model_war->cancelRequestFight($this->args()->id, Auth::id())){
        $this->message->set('success_cancel_request','Your request has been canceled!');
        Router::redirect('wars');
      }
      else {
        $this->message->set('error_request','request error!');
        Router::redirect('wars');
      }
    }
    else {
      Router::redirect('wars');
    }
  }

  // validate functions

  function validateRequest(){
    if(isset($this->args()->id)){
      if($this->model_war->getUserById($this->args()->id)){
        if(!$this->model_war->getRequest($this->args()->id, Auth::id()) && !$this->model_war->getRequest(Auth::id(), $this->args()->id)) {
          return TRUE;
        }
        else {
          $this->message->set('error_validateRequest','request validate error!');
          return FALSE;
        }
      }
      else {
        $this->message->set('error_validateRequest','request validate error!');
        return FALSE;
      }
    }
    else {
      $this->message->set('error_validateRequest','request validate error!');
      return FALSE;
    }
  }

  function validateCancelRequest(){
    if(isset($this->args()->id)){
      if($this->model_war->getUserById($this->args()->id)){
        if($this->model_war->getRequest($this->args()->id, Auth::id())) {
          return TRUE;
        }
        else {
          $this->message->set('error_validateRequest','request validate error!');
          return FALSE;
        }
      }
      else {
        $this->message->set('error_validateRequest','request validate error!');
        return FALSE;
      }
    }
    else {
      $this->message->set('error_validateRequest','request validate error!');
      return FALSE;
    }
  }

}
