<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="en">

<body>
    
</html>
<?php 

require 'require/database.php';
include 'profil.php';
include 'includes/head.php';

$temps_session = 15; // TPS ACTIF USER
$temps_actuel = date("U");
$ip_user = $_SERVER['REMOTE_ADDR']; // AFFICH IP USER


$req_ip_existe = $bdd->prepare('SELECT * FROM online WHERE user_ip = ?');
$req_ip_existe->execute(array($ip_user));
$ip_existe = $req_ip_existe->rowCount();
if($ip_existe ==0){
    $add_ip = $bdd->prepare('INSERT INTO online (ip_user,time) VALUES (?, ?)');
}


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
 
</body>