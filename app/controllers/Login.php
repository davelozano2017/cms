<?php 

class Login extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('pages/login');
  }


}