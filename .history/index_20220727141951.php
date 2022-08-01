<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="en">


<html>
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



<header> 

<a href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a>  <!-- aFFICHAGE  PROFIL SI ID EXISTE-->
    


</header>





<section class="hero_index">
<?php foreach($articles as $articles) :?>

  

  <a href="profil.php?id=<?= $articles['id']?>"> <div class="user_container">

    <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150"><br>

<div class="user_info">
    <span><a href="profil.php?id=<?= $articles['id']?>"><?php echo $articles['pseudo'] ?></span><br><br>

    <span><?php echo $articles['age'] ?></span><br> <br>

</div>
    
</a>

    </div>



    <?php endforeach; ?>
</section>
<script src="social.js"></script>

</body>


</html>