<?php 

class Customer extends Controller {

  public function __construct() {
    parent::__construct();
    if(!isset($_SESSION['accounts_id'])) {
      redirect('login');
    }
  }

  public function index() {
    $this->customer();
  }


  public function customer() {
    $data['title'] = 'Customer';
    $data['query'] = $this->model->use('AccountModel')->GetUserByRoles('Customer');
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/customer',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function view($id) {
    $data['title'] = 'Customer';
    $accounts_id = decode($id);
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $data['query'] = $this->model->use('AccountModel')->GetAccountsByAccountsId($accounts_id);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/customer/view',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function logout() {
    unset($_SESSION['accounts_id']);
    redirect('login','You are logged out.');
  }
}