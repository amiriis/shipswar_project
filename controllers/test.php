<?php

class ControllerTest extends Controller {
  function index(){

    $this->load->model('full/amir');

    $data['header'] = $this->load->controller('sub','index');

    $this->model_full_amir->get();

  }
}
