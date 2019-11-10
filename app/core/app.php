<?php

class App{

	protected $controller 	= default_controller;
	protected $method 		= 'index';
	protected $errors 		= default_errors;
	protected $params 		= [];
 
	public function __construct() {
		$url = $this->parseUrl();

		if(file_exists('app/controllers/' . $url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		} elseif(!file_exists('app/controllers/' . $this->controller . '.php')) {
			$this->goToErrorPage();
		} else {
			!$url[0] ? $this->controller = $this->controller : $this->controller = $this->errors;
		}
		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;
		if(isset($url[1])) {
			if(method_exists($this->controller, $url[1])) {
				$r = new ReflectionMethod($this->controller, $url[1]);
				$params = $r->getParameters();
				foreach ($params as $param):
					$data = $param->getName();
					isset($url[2]) == !empty($data) ? $this->method = $url[1] : $this->goToErrorPage();
				endforeach;
				$this->method = $url[1];
				unset($url[1]);
				} else {
					$this->goToErrorPage();
				}
		} 
		$this->params = $url ?  array_values($url) : [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseUrl() {
		if(isset($_GET['url'])){
			$url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			return $url;
		}
	}

	public function goToErrorPage() {
		require_once 'app/controllers/' . $this->errors . '.php';
		$this->errors = new $this->errors;
		call_user_func_array([$this->errors, $this->method], $this->params);
		exit;
	}
}