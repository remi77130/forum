<!-- fichier pour recup toutes les questions de l'utilisateur qui posséde session id -->

<?php 

require('require/database.php') ?>

<?php
// RECUP LES QUESTIONS OU ID AUTEUR
$getAllMyquestions = $bdd->prepare('SELECT titre, description, contenu FROM questions where id_auteur = ?');

//$getAllMyquestions->execute(array($_SESSION['id']));



?>