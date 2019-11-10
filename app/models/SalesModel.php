<?php 

class SalesModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetSalesById($accounts_id) {
        return $this->db->select('transactions','*',['accounts_id' => $accounts_id]);
    } 

}


