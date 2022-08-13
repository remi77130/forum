<?php


try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
} 

// LOCAL =     $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');
// EN LIVE =   $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', 'oemr6702', '');


catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
