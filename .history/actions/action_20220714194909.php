<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');


if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){ 

    $getid = (int) $_GET['id']; // 
    $gett = (int) $_GET['t']; // 
    $check = $bdd->prepare('SELECT id FROM membres WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() ==1){

        if($gett == 0){ // 0 = LIKE DONC GETT = 0 INSERT UN likes   
            $ins = $bdd->prepare('INSERT INTO likes (id_article) VALUES (?)');
            $ins->execute(array($getid));

        }
        
        elseif($gett == 1){
            $ins = $bdd->prepare('INSERT INTO dislikes (id_article) VALUES (?)');
            $ins->execute(array($getid));

        }
        header('Location: '.$_SERVER['HTTP_REFERER']); //HEADER SUR LA DERNIERE PAGE VISITED
    }else{
        ('ERREUR fatale');
    }

}