<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');


if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $avatar = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $avatar->execute(array($get_id));
    
    if($avatar->rowCount() == 1) {
       $avatar = $avatar->fetch();
 

       $likes = $bdd->prepare('SELECT id FROM likes WHERE id_article = ?');
       $likes->execute(array($avatar));
       $likes = $likes->rowCount();

       $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE id_article = ?');
       $dislikes->execute(array($id));
       $dislikes = $dislikes->rowCount();
    } 
    
    else 
    {
       die('Cet article n\'existe pas !');
    }
 } 
 else 
 {
    die('Erreur');
 }
 ?>