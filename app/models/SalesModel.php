<?php 

class SalesModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetSalesById($accounts_id) {
        return $this->db->select('transactions','*',['accounts_id' => $accounts_id]);
    } 

    public function GetAllTransactions() {
        return $this->db->select('transactions', [
            "[>]products" => ["transactions.products_id" => "products_id"],
            "[>]accounts" => ["accounts_id" => "accounts_id"],
        ],'*',['GROUP' => ['accounts.accounts_id']]);
    } 

    public function GetTransactionsByAccountsId($accounts_id) {
        return $this->db->select('transactions', [
            "[>]products" => ["transactions.products_id" => "products_id"],
        ],'*',['transactions.accounts_id' => $accounts_id]);
    } 

    public function GetTransactionByReference($reference) {
        return $this->db->select('transactions','*',['reference' => $reference]);
    }

    public function GetProductTotalPrice($products_id) {
        return $this->db->select('products',["[>]transactions" => ['products.products_id' => 'products_id']],'*',['products_id' => $products_id]);
    }



}


