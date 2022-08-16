<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/profil_membre.css">



<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>

    
<?php 

require 'require/database.php';
include 'profil.php';
include 'includes/head.php';

?>




<?php

$requser = "SELECT * FROM membres ORDER BY id DESC";
$requete = $bdd->query($requser);
// RECUPERE LES DONEES 
$articles = $requete->fetchAll(); ?>



<header class="header_profil_membre"> 
    <div class="profil_link">
<a href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a>  <!-- aFFICHAGE  PROFIL SI ID EXISTE-->
    </div>
</header>





<section class="hero_index">

<?php foreach($articles as $articles) :?>

  

<a href="profil.php?id=<?= $articles['id']?>"> <div class="user_container">

<img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" >


<div class="user_info">

    <h2><?php echo $articles['pseudo'] ?> 


    <span><?php echo $articles['age'] ?></span> </h2>

</div>
    
</a>


    <?php endforeach; ?>
</section>

</body>


</html>

