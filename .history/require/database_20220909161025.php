<?php


try{

       //Live mettre en commentaire pour travailler en local puis retirer pour envoyer en live
       $bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', 'oemr6702', 'WTDz-geeS-az4+');
    
       // Local mettre en commentaire pour envoyer en live 
    //$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');

} 



catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
}
