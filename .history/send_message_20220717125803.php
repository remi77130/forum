<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');



if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$requser = $bdd->prepare('SELECT * FROM membres WHERE id = id');
$requser->execute(array($_SESSION['id']));
$msg_nbr = $requser->rowCount();
?>
