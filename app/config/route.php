<?php 

$routes = array();
























/*
    ~ DO NOT ~  edit this except the parameters
    Example welcome change to anything you like
    just make sure the controller is existing
*/
$routes['default_controller'] = 'Login';
$routes['default_method'] = 'index';
$routes['default_errors'] = 'errors';

foreach($routes as $key => $value) {
    define($key,$value);
}