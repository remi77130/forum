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



<a href="profil.php">Mon Profil</a>

<section class="hero_index">
<?php foreach($articles as $articles) :?>

  

    <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150"><br>


    <span>
        <a href="profil.php?id=<?= $articles['id']?>"><?php echo $articles['pseudo'] ?></span><br><br>

    <span><?php echo $articles['age'] ?></span><br> <br>

    
</a>

    <?php endforeach; ?>
</section>
 
<?php


