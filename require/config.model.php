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
    case 'piccirillo-website.test': 
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
define("DB_HOST", $db_host);
define("DB_USER", $db_user);
define("DB_PASS", $db_pass);
define("DB_BASE", $db_base);
define("NB_MESSAGES_INIT_LOAD", 4);//Permet de définir le nombre de messages à charger quand on ouvre le fil
define("NB_MESSAGES_AJAX_LOAD", 2);//Permet de définir le nombre de messages à charger quand on clique sur le bouton pour charger plus d'historique
?>