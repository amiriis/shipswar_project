<?php

class ControllerMirTest extends Controller {
  function index(){

    $this->load->model('full/amir');

    $data['amir'] = $this->model_full_amir->get();

    $data['test'] = 'ya asfsaf';

    $this->load->view('test.twig',$data);

  }

  function host(){
    echo "string";


  }
}
