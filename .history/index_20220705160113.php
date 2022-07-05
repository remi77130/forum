<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="en">

<body>
    
</html>
<?php 

require 'require/database.php';
include 'profil.php';
include 'includes/head.php';

$temps_session = 15;
$temps_actuel = date("U");
$user_ip = "11588";
$req_ip_exist = $bdd->prepare('SELECT * FROM online WHERE user_ip = ?');
$req_ip_exist->execute(array($user_ip));
$ip_existe = $req_ip_exist->rowCount();

if($ip_existe == 0) {
   $add_ip = $bdd->prepare('INSERT INTO online(user_ip,time) VALUES(?,?)');
   $add_ip->execute(array($user_ip,$temps_actuel));
} 

else 
{
   $update_ip = $bdd->prepare('UPDATE online SET time = ? WHERE user_ip = ?');
   $update_ip->execute(array($temps_actuel,$user_ip));
}


$session_delete_time = $temps_actuel - $temps_session;
$del_ip = $bdd->prepare('DELETE FROM online WHERE time < ?'); // TEMPS ACTUEL MOINS LE TEMPS DE LA SESSION

$del_ip->execute(array($session_delete_time));

$show_user_nbr = $bdd->query('SELECT * FROM online'); // AFFICHE USER ONLINE 

$user_nbr = $show_user_nbr->rowCount();


?>









<?php

$requser = "SELECT * FROM membres ORDER BY id DESC";
$requete = $bdd->query($requser);
// RECUPERE LES DONEES 
$articles = $requete->fetchAll(); ?>


<header> 

<a href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a>  <!-- aFFICHAGE  PROFIL SI ID EXISTE-->
echo $user_nbr;


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