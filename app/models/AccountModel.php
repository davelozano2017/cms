<?php 

class AccountModel extends Model {

    public function __construct() {
        parent::__construct();
    }


    public function secureLogin($data) {
        if($this->db->has('accounts',['email' => $data['email']])) {
            $check = $this->db->select('accounts','*',['email' => $data['email']]);
            $hash = $check[0]['password'];
            if(verify($data['password'],$hash)) {
                $_SESSION['accounts_id'] = $check[0]['accounts_id'];
                $_SESSION['role'] = $check[0]['role'];
                switch($_SESSION['role']) {
                  case 'Administrator'; redirect('customer'); break;
                }
            } else {
                redirect('login','Invalid username or password');
            }
        } else {
            redirect('login','Invalid username or password');
        }
    }

    public function CreateNewUser($data) {
        if($this->db->has('accounts',['email' => $data['email']])) {
            redirect('customer','Email already exist');
        } else {
            $this->db->insert('accounts',$data);
            redirect('customer','New user has been added');
        }
    }

    public function countDriversByAccountsId($accounts_id) {
        return $this->db->count('drivers','*',['accounts_id' => $accounts_id]);
    }

    public function GetUserByRoles($role) {
        return $this->db->select('accounts','*',['role' => $role]);
    }

    public function CoutUserByRoles($role) {
        return $this->db->count('accounts','*',['role' => $role]);
    }
    
    public function UpdateUserById($data) {
        $this->db->update('accounts',$data,['accounts_id' => $data['accounts_id']]);
        redirect('customer/view/'.encode($data['accounts_id']),'Data has been changed.');
    }
    
    public function GetUserByid($accounts_id) {
        return $this->db->select('accounts','*',['accounts_id' => $accounts_id ]);
    }

    public function GetAccountsByAccountsId($accounts_id) {
        return $this->db->select('accounts','*',['accounts_id' => $accounts_id]);
    } 

}


