<?php 

class Products extends Controller {

  public function __construct() {
    parent::__construct();
    if(!isset($_SESSION['accounts_id'])) {
      redirect('login');
    }
  }

  public function index() {
    $this->products();
  }


  public function products() {
    $data['title'] = 'Products';
    $data['category'] = $this->model->use('CategoryModel')->GetAllCategories();
    $data['query'] = $this->model->use('ProductsModel')->GetAllProducts();
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/products',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function view($id) {
    $data['title'] = 'Products';
    $products_id = decode($id);
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $data['category'] = $this->model->use('CategoryModel')->GetAllCategories();
    $data['query'] = $this->model->use('ProductsModel')->GetProductsUsingId($products_id);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/products/view',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function UpdateProductsByProductsId() {
    $data = array(
      'products_id'     => decode(post('products_id')),
      'categories_id'   => decode(post('categories_id')),
      'products_name'   => post('products_name'),
      'products_price'  => post('products_price'),
      'products_stocks' => post('products_stocks'),
    );
    $this->model->use('ProductsModel')->UpdateProductsByProductsId($data);
  }

  public function AddProducts() {
    $data = array(
      'categories_id'   => decode(post('categories_id')),
      'products_name'   => post('products_name'),
      'products_price'  => post('products_price'),
      'products_stocks' => post('products_stocks'),
    );
    $this->model->use('ProductsModel')->AddProducts($data);
  }

  public function logout() {
    unset($_SESSION['accounts_id']);
    redirect('login','You are logged out.');
  }
}