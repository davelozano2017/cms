<?php 

class ProductsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAllProducts() {
        return $this->db->select('products', ["[>]categories" => ["categories_id" => "categories_id"]],'*');
    } 

    public function GetProductsById($data) {
        $query = $this->db->select('products','*',['products_id' => $data['products_id']]);
        if($_SESSION['cart'][$data['products_id']]['products_id'] == $data['products_id']) {
            $_SESSION['cart'][$data['products_id']] = array(
                'products_id'      => $query[0]['products_id'],
                'products_name'    => $query[0]['products_name'],
                'products_price'    => $query[0]['products_price'],
                'products_stocks'   => $query[0]['products_stocks'],
                'products_quantity' => $_SESSION['cart'][$data['products_id']]['products_quantity'] += $data['quantity']
            );
            redirect('order',$query[0]['products_name'].' has been added to you cart.');
        } else {

            if($query[0]['products_stocks'] < $data['quantity']) {
                redirect('order','insufficient stocks');
            } else {
                $_SESSION['cart'][$data['products_id']] = array(
                    'products_id'      => $query[0]['products_id'],
                    'products_name'    => $query[0]['products_name'],
                    'products_price'    => $query[0]['products_price'],
                    'products_stocks'   => $query[0]['products_stocks'],
                    'products_quantity' => $data['quantity']
                );
                redirect('order',$query[0]['products_name'].' has been added to you cart.');
            }
           
        }
    }

    public function CompleteTransaction($accouts_id) {
        $reference = rand(111111,999999);
        foreach($_SESSION['cart'] as $key => $value) {
            $data = array(
                'products_id' => $value['products_id'],
                'accounts_id' => $accouts_id,
                'quantity'    => $value['products_quantity'],
                'reference'   => $reference,
            );
            $query = $this->db->insert('transactions',$data);
            if($query) {
                $stocks = $value['products_stocks'] - $value['products_quantity'];
                $this->db->update('products',[
                    'products_stocks' => $stocks
                ],['products_id' => $value['products_id']]); 
            }
        }
        unset($_SESSION['cart']);
        redirect('order','Transaction has been copleted');
    }

    public function AddProducts($data) {
        if($this->db->has('products', ['products_name' => $data['products_name']])) {
            redirect('products',$data['products_name'].' already exist.');
        } else {
            $this->db->insert('products',$data);
            redirect('products',$data['products_name'].' has been added.');
        }
    }

    public function UpdateProductsByProductsId($data) {
        $this->db->update('products',$data,['products_id' => $data['products_id']]);
        redirect('products/view/'.encode($data['products_id']),$data['products_name'].' has been updated.');

    }

    public function GetProductsUsingId($products_id) {
        return $this->db->select('products', ["[>]categories" => ["categories_id" => "categories_id"]],'*',['products_id' => $products_id]);
    }

    public function GetProductTotalPrice($products_id) {
        return $this->db->select('products','*',['products_id' => $products_id]);
    }



}


