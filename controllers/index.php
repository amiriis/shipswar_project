<?php

class ControllerIndex extends Controller {
  function index(){
    $this->output($this->load->view('index.twig', $this->data));
  }
}
