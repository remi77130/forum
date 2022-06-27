<!-- Page affichage des membres -->


<?php 
session_start(); //pour recup dans la bdd   

require('database.php');


?>

<?php 

$requser = "SELECT * FROM membres ";

$requete = $bdd->query($requser);

// RECUPERE LES DONEES 

$articles = $requete->fetchAll();


?>

<section>
<?php foreach($articles as $articles) :?>

    <span><a href=""><?php echo $articles['pseudo'] ?></a></span><br><br>

    <span><?php echo $articles['age'] ?></span><br> <br>

    <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150">

    
    <?php endforeach; ?>
</section>
 
<?php


