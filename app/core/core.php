<?php 

class core {

    public function __construct() {
		$this->model = new models();
        $this->load = new views();
    }
}

class models {

	public function __construct() {
	}


    public function use($model) {
		$var ='app/models/' . $model . '.php';
		if(file_exists($var)){
			require_once $var;	
			return new $model();
		}else{
			exit();
		}
    }

}


class Views  {

	public function view($view, $data = [], $fields = []) {
		$var = 'app/views/' . $view . '.php';	 
        file_exists($var) ? require_once $var : '';
	}
	
} 