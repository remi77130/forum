<?php
/*
 * On vient récupérer le fichier où se trouvent les configurations pour se connecter à la DB
 * 'require_once' fait le même rôle que include, mais est plus adapté pour ce cas-là (car on n'aura pas besoin de ré-include ce fichier, d'où le 'once')
 */

require_once 'config.php';

<<<<<<< HEAD
try{

       //Live mettre en commentaire pour travailler en local puis retirer pour envoyer en live
       //$bdd = new PDO('mysql:host=localhost;dbname=oemr6702_forum;charset=utf8;', 'oemr6702', 'WTDz-geeS-az4+');
    
       // Local mettre en commentaire pour envoyer en live 
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8;', 'root', '');

} 



catch(Exception $e){

    die('Une erreur à été trouvée : ' . $e->getMessage());
=======
try {
    $bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_BASE.';charset=utf8;', DB_USER, DB_PASS);
} catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
>>>>>>> 1b2d82561b146f0d80dcad84845ee5e1c860e692
}
?>