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

    <span><?php echo $articles['pseudo'] ?></span>
    <span><?php echo $articles['age'] ?></span>

    <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" width="150">

    
    <?php endforeach; ?>
</section>
 <?php                           // AFFICHAGE DE LA PHOTO

         if (empty($userinfo['avatar']))
         {
         ?>
         <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150">
         <?php

         }
         ?> 
<?php


