<?php


try{
    $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', 'oemr6702', '');
} // POUR TRAVAILLER EN LOCA  ::: mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
// POUR TRAVAILLER EN LIVE  $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', 'oemr6702_remi', 'Remi123&');

catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}