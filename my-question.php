
<!-- Afficher les questions de user -->

<?php 
include 'actions/myQuestionsAction.php'; // Pour aceder a la requete getAllMyquestions

//require ('actions/securityAction.php');// AJOUTER UN FICHIER POUR PERMETTRE A USER DETRE REDIRIGER SUR LA PAGE DE CONNEXION SI IL EST PAS AUTHENTIFIER
include 'includes/init.php';
//include 'verif.php';


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes questions</title>
</head>
<body>

<h2>Toutes mes questions</h2>

<?php include 'includes/navbar.php' ?>

<?php
while($question = $getAllMyquestions->fetch()){
    ?>
    <div class="card">
        <h5><?= $question['titre'] ?></5>
        <p><?= $question['description'] ?></p>
        <p><?= $question['contenu'] ?></p>

        <a href="#">Accéder à la question</a>
        <a href="#">Modifier ma question</a>



    </div>
    <?php
}
?>
    
</body>
</html>