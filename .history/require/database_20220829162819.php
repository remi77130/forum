<?php


try{

    //O2SWITCH $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum', 'oemr6702', 'WTDz-geeS-az4+');
         // LIVE $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', 'oemr6702_remi', 'Remi123&');
     $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');

} 



catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
