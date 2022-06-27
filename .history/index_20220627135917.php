<!-- Page affichage des membres -->


<?php 
session_start(); //pour recup dans la bdd   

require('database.php');


?>

<?php 

$requser = "SELECT * FROM membres WHERE id = ?";

$requete = $bdd->query($requser);

// RECUPERE LES DONEES 

$articles = $requete->fetchAll();


?>

<section>
<?php foreach($articles as $articles) :?>

    <h1><?php echo $articles['pseudo'] ?></h1>
    <?php endforeach; ?>
</section>

<?php


