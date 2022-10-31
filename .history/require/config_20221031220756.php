<?php
$host = $_SERVER['HTTP_HOST'];

switch($host) {

    // Pour le site de production
    case 'chanderland.com': 
        $db_host = 'localhost';
        $db_user = 'oemr6702_remi';
        $db_pass = 'Remi123&';
        $db_base = 'oemr6702_forum';
        break;

    // Pour le site hébergé chez Kévin
    case 'piccirillo-website.test': 
        $db_host = '';
        $db_user = '';
        $db_pass = '';
        $db_base = '';
        break;

    // Pour le local de chez Rémi
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