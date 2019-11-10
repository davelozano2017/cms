<?php
function encode($data){
	$id = (double) $data * 525325.24;
	return base64_encode($id);
}

function decode($data){
	$id = (double) base64_decode($data) / 525325.24;
	return $id;
}

function redirect($url,$message = null){ 
	if(empty($message)) {
		header("Location: ".url_root.$url);
	} else {
		$_SESSION['message'] = $message;
		header("Location: ".url_root.$url);
	}
}

function hashing($password) {
	return password_hash($password,PASSWORD_DEFAULT);
}

function dd($data) {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
	exit;
}

function verify($password,$hash) {
	return password_verify($password,$hash);
}

function post($data) {
	return htmlentities($_POST[$data]);
}

function site_url($path) {
	return url.$path;
}

function base_url() {
	return url;
}

function get_ip() {
	$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}