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
<a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a>  <!-- aFFICHAGE  PROFIL SI ID EXISTE-->
    </div>
</header>



<?php include 'includes/search.php';?> <!-- Bar de recherche -->



<section class="hero_index">

<?php foreach($articles as $articles) :?>

  
<div class="container_profil_membre">
<a href="profil.php?id=<?= $articles['id']?>"> 



<div class="container_profil_info">


<div class="container_profil_avatar">
<img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" >
</div>

<div class="container_profil_info_pseudo">    
    <h2><?php echo $articles['pseudo'] ?> </h2>
</div>

</div>

<!-- info profil -->

<div class="info_profil_pseudo&nom_dpt">

<div class="dpt_age">

<div class="container_profil_info_dtp">    
  <span > Dpt<?php echo  $articles['departement_nom'] ?> </span>
</div>

<div class="container_profil_info_age">    
    <span><?php echo $articles['age'] ?></span> 
</div>

</div>


<div class="container_profil_info_descr">    
    <?php echo $articles['description_profil'] ?>
</div>

</div>


    
</a>
</div>





<?php endforeach; ?>




</section>









</body>


</html>