<!-- Page affichage des membres -->


<?php 
session_start();

require('database.php');
include('profil.php');


if(isset($_SESSION['id']) AND !empty($_SESSION['id']))

?>

<?php 


$requete = $bdd->query($requser);

// RECUPERE LES DONEES 

$articles = $requete->fetchAll();


?>




<a href="profil.php?id=<?= $_SESSION['id']?>">Profil</a>

<section>
<?php foreach($articles as $articles) :?>

  

    <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150"><br>


    <span><a href="profil.php?id=<?= $articles['id']?>"><?php echo $articles['pseudo'] ?></span><br><br>

    <span><?php echo $articles['age'] ?></span><br> <br>

    
</a>

    <?php endforeach; ?>
</section>
 
<?php


