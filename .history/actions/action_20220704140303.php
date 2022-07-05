<?php 

require 'require/database.php';

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])){

    $check = $bdd->prepare('SELECT id FROM membres WHERE id = ?');

}






?>