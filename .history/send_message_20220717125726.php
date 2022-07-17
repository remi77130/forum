<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');



if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$requser = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? ORDER BY id DESC');
$requser->execute(array($_SESSION['id']));
$msg_nbr = $requser->rowCount();
?>
