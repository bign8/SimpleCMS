<?php

set_magic_quotes_runtime(0);

error_reporting(E_ALL);
ini_set('display_errors', '1');

// if ( !defined('__DIR__') ) define('__DIR__', dirname(__FILE__)); // php < 5.3.0 fix

require_once('/home/sleepdia/libinc/config.php');
require_once('/home/sleepdia/libinc/db.php');
require_once('/home/sleepdia/libinc/smarty/SmartyConfig.php');
require_once('/home/sleepdia/libinc/PHPMailer/class.phpmailer.php');
require_once('/home/sleepdia/libinc/page.php');
require_once('/home/sleepdia/libinc/user.php');
require_once('/home/sleepdia/libinc/mail.php');

