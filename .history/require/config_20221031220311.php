<?php



print_r($_SERVER);
exit; 


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


var_dump($db_host);

?>