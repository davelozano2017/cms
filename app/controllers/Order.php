<?php 

class Order extends Controller {

  public function __construct() {
    parent::__construct();
    if(!isset($_SESSION['accounts_id'])) {
      redirect('login');
    }
  }

  public function index() {
    $this->order();
  }


  public function order() {
    $data['title'] = 'Order';
    $data['query'] = $this->model->use('ProductsModel')->GetAllProducts();
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $data['customers'] = $this->model->use('AccountModel')->GetUserByRoles('Customer');
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/order',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function AddOrUpdate($id) {
    $products_id = decode($id);
    $query = $this->model->use('ProductsModel')->GetProductsById($products_id);

  }

  public function CompleteTransaction() {
    $accouts_id = decode(post('accounts_id'));
    $this->model->use('ProductsModel')->CompleteTransaction($accouts_id);
  }

  
}