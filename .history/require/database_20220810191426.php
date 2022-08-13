<?php


try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
} // POUR TRAVAILLER EN LOCA  ::: mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
