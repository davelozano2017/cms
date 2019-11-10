<?php
session_start();
ob_start();

require_once 'config/define.php';
require_once 'config/route.php';
require_once 'core/app.php';
require_once 'core/core.php';
require_once 'core/controller.php';
require_once 'core/Medoo.php';
require_once 'core/model.php';
require_once 'core/functions.php';
require_once 'third-party/validator/vendor/autoload.php';

date_default_timezone_set(timezone);
