<?php 

class CategoryModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAllCategories() {
      return $this->db->select('categories','*');
    }

    public function GetCategoriesByCategoriesId($categories_id) {
        return $this->db->select('categories','*',['categories_id' => $categories_id]);
    }

    public function AddCategories($data) {
        if($this->db->has('categories', ['category_name' => $data['category_name']])) {
            redirect('categories',$data['category_name'].' already exist.');
        } else {
            $this->db->insert('categories',$data);
            redirect('categories',$data['category_name'].' has been added.');
        }
    }

    public function UpdateCategoryByCategoriesId($data) {
        $this->db->update('categories',$data,['categories_id' => $data['categories_id']]);
        redirect('categories/view/'.encode($data['categories_id']),$data['category_name'].' has been updated.');

    }

}


