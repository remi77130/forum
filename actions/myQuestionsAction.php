<!-- fichier pour recup toutes les questions de l'utilisateur qui posséde session id -->

<?php 

require('require/database.php') ?>

<?php
// RECUP LES QUESTIONS OU ID AUTEUR
$getAllMyquestions = $bdd->prepare('SELECT id, titre, description FROM questions where id_auteur = ?');

//$getAllMyquestions->execute(array($_SESSION['id']));



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

Mes questions
    
</body>
</html>