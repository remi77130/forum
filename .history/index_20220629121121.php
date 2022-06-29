<!-- Page affichage des membres -->


<?php 

require('database.php');
include('profil.php');



?>

<?php 

$requser = "SELECT * FROM membres ORDER BY id DESC";

$requete = $bdd->query($requser);

// RECUPERE LES DONEES 

$articles = $requete->fetchAll();


?>


<header> 




</header>





<section class="hero_index">
<?php foreach($articles as $articles) :?>

  

    <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150"><br>


    <span><a href="profil.php?id=<?= $articles['id']?>"><?php echo $articles['pseudo'] ?></span><br><br>

    <span><?php echo $articles['age'] ?></span><br> <br>

    
</a>



<?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editProfil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>

    <?php endforeach; ?>
</section>
 
<?php


