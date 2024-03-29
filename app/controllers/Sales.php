<?php 

class Sales extends Controller {

  public function __construct() {
    parent::__construct();
    if(!isset($_SESSION['accounts_id'])) {
      redirect('login');
    }
  }

  public function index() {
    $this->sales();
  }


  public function sales() {
    $data['title'] = 'Sales';
    $query = $this->model->use('SalesModel')->GetAllTransactions();
    $data['customers'] = $this->model->use('AccountModel')->GetUserByRoles('Customer');
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $query = $this->model->use('SalesModel')->GetAllTransactions();
    foreach($query as $row) {
    $totalSales = 0;
    $queryA = $this->model->use('SalesModel')->GetTransactionsByAccountsId($row['accounts_id']);
    foreach($queryA as $rA) {
      $totalSales += $rA['products_price'] * $rA['quantity'];
    }
      $show[] = array(
        'allTransaction' => $row, 
        'totalSales' => $totalSales
      );
    } 

    $data['result'] = $show;
    
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/sales',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }

  public function view($accounts_id) {
    $data['title'] = 'Sales';
    $query = $this->model->use('SalesModel')->GetAllTransactions();
    $data['customers'] = $this->model->use('AccountModel')->GetUserByRoles('Customer');
    $data['user'] = $this->model->use('AccountModel')->GetUserById($_SESSION['accounts_id']);
    $query = $this->model->use('SalesModel')->GetAllTransactionsUsingId($accounts_id);
    foreach($query as $row) {
    $totalSales = 0;
    $queryA = $this->model->use('SalesModel')->GetTransactionsByAccountsId($row['accounts_id']);
    foreach($queryA as $rA) {
      $totalSales += $rA['products_price'] * $rA['quantity'];
    }
      $show[] = array(
        'allTransaction' => $row, 
        'totalSales' => $totalSales
      );
    } 

    $data['result'] = $show;
    
    $this->load->view('layouts/header',$data);
    $this->load->view('layouts/side-navigation',$data);
    $this->load->view('pages/sales/view',$data);
    $this->load->view('layouts/footer',$data);
    $this->load->view('layouts/scripts',$data);
  }


  public function result($ref) {
    $data['title'] = 'Sales';
    $data['customers'] = $this->model->use('AccountModel')->GetUserByRoles('Customer');
    $reference = decode($ref);
    $transactionQuery = $this->model->use('SalesModel')->GetSalesByReference($reference);
    $data['user'] = $this->model->use('AccountModel')->GetUserById($transactionQuery[0]['accounts_id']);
    if($transactionQuery == null) {
      redirect('sales');
    } else {
      foreach($transactionQuery as $trow) {
        $prow = $this->model->use('ProductsModel')->GetProductsUsingId($trow['products_id']);
        $show[] = array(
          'reference' => $reference,
          'products_name' => $prow[0]['products_name'] ,
          'quantity' => $trow['quantity'],
          'date' => $trow['date'],
          'products_price' => $prow[0]['products_price'],
          'line_total' => $prow[0]['products_price'] * $trow['quantity'],
        );
      }
      $data['result'] = $show;
      $this->load->view('pages/result',$data);
    }
    
  }

  public function logout() {
    unset($_SESSION['accounts_id']);
    redirect('login','You are logged out.');
  }
}