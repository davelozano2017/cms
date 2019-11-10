<?php

class Views  {
	 
	public function view($view, $data = [], $fields = []) {
		$var = 'app/views/' . $view . '.php';	 
        file_exists($var) ? require_once $var : '';
	}
	
} 