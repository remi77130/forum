<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'oemr6702_remi', '');
}
catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
