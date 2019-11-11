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
            "[>]products" => ["products.products_id" => "products_id"],
            "[>]accounts" => ["accounts_id" => "accounts_id"],
        ],'*',['GROUP' => ['reference']]);
    } 

    public function GetTransactionByReference($reference) {
        return $this->db->select('transactions','*',['reference' => $reference]);
    }



}


