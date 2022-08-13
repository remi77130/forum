<?php


try{
    $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', '', '');
} // POUR TRAVAILLER EN LOCA  ::: mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
