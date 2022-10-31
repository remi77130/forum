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

define("DB_HOST", "something more");
define("DB_USER", "something more");
define("DB_PASS", "something more");
define("DB_BASE", "something more");



var_dump($db_host);

const  = $db_host; // L'hôte de la DB
const  = $db_user; // L'utilisateur de la DB
const  = $db_pass; // Le mot de passe de la DB
const  = $db_base; // La nom de la base de données

?>