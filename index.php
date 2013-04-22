<?php

/**
 * WEB_ROOT_FOLDER is the name of the parent folder you created these 
 * documents in.
 */
session_start();
//error_reporting(E_ALL);
//debug mode off
error_reporting(0);
define('SERVER_ROOT', 'c:\xampp\htdocs\cw01');

//yoursite.com is your webserver
define('SITE_ROOT', 'http://localhost:8080/cw01');

define('MYACTIVERECORD_CONNECTION_STR', 'mysql://root@localhost/coursework');

require_once("controllers/router.php");
?>