<?php 

session_start();
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

        header("Location: connexion.php");

    }else{
        exit('Erreur fatal. <a href="http://localhost/Forum/"> revenir à l\'acceuil</a>');
    }

}else {

    exit('Erreur fatal. Erreur fatal. <a href="http://localhost/Forum/"> revenir à l\'acceuil</a>');
}


$likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
$likes->execute(array($id));
$likes = $likes->rowCount();
$dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
$dislikes->execute(array($id));
$dislikes = $dislikes->rowCount();




?>