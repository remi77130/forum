<?php
$host = $_SERVER['HTTP_HOST'];

switch($host) {

case 'chanderland.com': 
    $db_host = '';
    $db_user = '';
    $db_pass = '';
    $db_base = '';
    break;

case 'piccirillo-website.test': 
    $db_host = '';
    $db_user = '';
    $db_pass = '';
    $db_base = '';
    break;

default:
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_base = 'forum';
}

define("DB_HOST", $db_host);
define("DB_USER", $db_user);
define("DB_PASS", $db_pass);
define("DB_BASE", $db_base);
?>