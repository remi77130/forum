<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');


if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){ 

    $getid = (int) $_GET['id']; // 
    $gett = (int) $_GET['t']; // 
    $check = $bdd->prepare('SELECT id FROM membres WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() ==1){

    }

}