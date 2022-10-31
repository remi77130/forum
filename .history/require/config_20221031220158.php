<?php



print_r($_SERVER);
exit; 


$host = $_SERVER['HTTP_HOST'];

switch($host) {

case'chanderland.com': 

    $db_host = '';
    $db_user = '';
    $db_pass = '';
    $db_base = '';

    case 'piccirillo-website.test': 
        $db_host = '';
        $db_user = '';
        $db_pass = '';
        $db_base = '';
default:
            $db_host = 'localhost';
            $db_user = 'root';
            $db_pass = '';
            $db_base = 'forum';
    
}


const DB_HOST = $db_host; // L'hôte de la DB
const DB_USER = $db_user; // L'utilisateur de la DB
const DB_PASS = $db_pass; // Le mot de passe de la DB
const DB_BASE = $db_base; // La nom de la base de données

?>