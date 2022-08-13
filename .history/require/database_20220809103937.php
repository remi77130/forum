<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=oemr6702;charset=utf8;', 'oemr6702_forum', 'Remi123&');
}
catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
