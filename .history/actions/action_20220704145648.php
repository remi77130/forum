<?php 

require 'require/database.php';

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){

    $getid = (int) $_GET['id']; // CONVERTIR ID EN INT 
    $gett = (int) $_GET['t'];
    $check = $bdd->prepare('SELECT id FROM membres WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() ==1){

        if($gett == 0 )
        {
            $ins = $bdd->prepare('INSERT INTO likes (id_article) VALUES (?)');
            $ins->execute(array($getid));

        }
        
        elseif($gett == 1)
        {
            $ins = $bdd->prepare('INSERT INTO dislikes (id_article) VALUES (?)');
            $ins->execute(array($getid));
        }

        header('Location: http://localhost/Forum/profil.php?id='.$getid); // 

    }else{
        exit('Erreur fatal');
    }

}else {

    exit('Erreur fatal');
}






?>