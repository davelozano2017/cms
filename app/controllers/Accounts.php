<?php 

class Accounts extends Controller {

  public function __construct(){
    parent:: __construct();
  }


  public function auth() {
    $data = array('email' => post('email'), 'password' => post('password'));
    $this->model->use('AccountModel')->secureLogin($data);
  }

  public function CreateNewUser() {
    $data = array(
      'name'        => post('name'),
      'email'       => post('email'),
      'address'     => post('address'),
      'contact'     => post('contact'),
      'password'    => hashing(post('secret')),
      'role'        => 'Customer', 
      'status'      => 1
    );
    $this->model->use('AccountModel')->CreateNewUser($data);
}


  public function UpdateUsersByAccountsId() {
    $data = array(
      'accounts_id' => decode(post('accounts_id')),
      'name'        => post('name'),
      'email'       => post('email'),
      'contact'     => post('contact'),
      'address'     => post('address')
    );
    $this->model->use('AccountModel')->UpdateUserById($data);
}

public function logout() {
  unset($_SESSION['accounts_id']);
  redirect('login','You are logged out.');
}

}