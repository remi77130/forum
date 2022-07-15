<?php

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

$req = $bdd->prepare("SELECT * from images where id= ?1");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array($_GET["id"]));
$tab=$req->fetchAll();
echo $tab[0]["bin"];


?>