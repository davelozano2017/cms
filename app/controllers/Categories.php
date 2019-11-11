<?php 

class Categories extends Controller {

  public function __construct() {
    parent::__construct();
    if(!isset($_SESSION['accounts_id'])) {
      redirect('login');
    }
  }

  public function index() {
    $this->categories();
  }


  public function categories() {
    $data['title'] = 'Categories';
    $data['query'] = $this->model->use('CategoryModel')->GetAllCategories();
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/categories',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function view($id) {
    $data['title'] = 'Categories';
    $categories_id = decode($id);
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $data['query'] = $this->model->use('CategoryModel')->GetCategoriesByCategoriesId($categories_id);
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/category/view',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function UpdateCategoryByCategoriesId() {
    $data = array(
      'categories_id' => decode(post('categories_id')),
      'category_name' => post('category_name')
    );
    $this->model->use('CategoryModel')->UpdateCategoryByCategoriesId($data);
  }

  public function AddCategories() {
    $data = array(
      'category_name' => post('category_name')
    );
    $this->model->use('CategoryModel')->AddCategories($data);
  }



  public function logout() {
    unset($_SESSION['accounts_id']);
    redirect('login','You are logged out.');
  }
}