<?php
$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
$url  = substr($_SERVER['SCRIPT_NAME'],0,$chop);
$configs = [
    'path' => [
        'assets'   => substr($_SERVER['SCRIPT_NAME'],0,$chop) . 'assets/',
        'uploads'  => 'uploads/',
        'doc_root' => substr($_SERVER['SCRIPT_FILENAME'],0,$chop),
        'url_root' => substr($_SERVER['SCRIPT_NAME'],0,$chop),
        'url'      => 'http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0,$chop)
    ],
    'csrf' => [
        'token' => base64_encode(openssl_random_pseudo_bytes(16))
    ],
    'database' => [
        'db_type'	   => 'mysql',
        'db_host'	   => 'localhost',
        'db_name'	   => 'cms',
        'db_username'  => 'root',
        'db_password'  => ''   
    ],
    'profile' => [
        'website_name' => 'Customer Management System',
        'date_format'  => 'F d Y g:i A',
        'timezone'     => 'Asia/Manila'
    ]   
];

foreach ($configs as $config) {
    foreach ($config as $key => $value) {
      define($key, $value);
    }
}