<?php 

require 'require/database.php';

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){

    $getid = (int) $_GET['id']; // CONVERTIR ID EN INT 

    $check = $bdd->prepare('SELECT id FROM membres WHERE id = ?');
    $check->execute(array($getid));

}






?>