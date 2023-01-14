<?php
$host = $_SERVER['HTTP_HOST'];

switch($host) {

    // Pour le site de production
    case 'chanderland.com': 
        $db_host = 'localhost';
        $db_user = '';
        $db_pass = '';
        $db_base = '';
        break;

    // Pour le site hébergé chez Kévin
    case '': 
        $db_host = '';
        $db_user = '';
        $db_pass = '';
        $db_base = '';
        break;

    // Pour le local de chez Rémi
    default:
        $db_host = 'localhost';
        $db_user = '';
        $db_pass = '';
        $db_base = '';
        $db_port = '';
}
function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
    if (isset($_SERVER['HTTP_HOST'])) {
        $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        $hostname = $_SERVER['HTTP_HOST'];
        $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), 0, PREG_SPLIT_NO_EMPTY);
        $core = $core[0];

        $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
        $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
        $base_url = sprintf( $tmplt, $http, $hostname, $end );
    }
    else $base_url = 'http://localhost/';

    if ($parse) {
        $base_url = parse_url($base_url);
        if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
    }

    return $base_url;
}
define("BASE_URL", base_url());
define("BASE_DIR", dirname( dirname(__FILE__) ));
define("NB_MESSAGES_INIT_LOAD", 4);
define("NB_MESSAGES_AJAX_LOAD", 2);
define("REALTIME_REFRESH_TIME", 5000);

//DB Params
define("DB_HOST", $db_host);
define("DB_USER", $db_user);
define("DB_PASS", $db_pass);
define("DB_BASE", $db_base);

//Mail params
define("MAIL_FROM", "hguv5320@hguv5320.odns.fr");
?>