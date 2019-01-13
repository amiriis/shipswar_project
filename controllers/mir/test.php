<?php

class ControllerMirTest extends Controller {
  function index(){

    $this->load->model('full/amir');

    $this->model_full_amir->get();

  }
}
