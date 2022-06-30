<!-- Page affichage des membres -->


<?php 

require 'require/database.php';
include 'profil.php';


?>
<?php

try {
    $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, mdp, age, sexe) VALUES(?,?,?,?,? )");
    $insertmbr->execute(array($pseudo, $mail, $password, $age, $sexe));
    
    }
    catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
    }
    
    $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
    $requser->execute(array($pseudo));
    $userexist = $requser->rowCount();
    if($userexist == 1) {
    $userinfo = $requser->fetch();
    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['pseudo'] = $userinfo['pseudo'];
    $_SESSION['mail'] = $userinfo['mail'];
    header("Location: index.php");
    
    }

// RECUPERE LES DONEES 

$articles = $requete->fetchAll();


?>


<header> 

<a href="profil.php?id=?<?= $_SESSION['id'] ?>">Mon Profil</a>  <!-- erreur ?????????-->


</header>





<section class="hero_index">
<?php foreach($articles as $articles) :?>

  

    <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil" width="150"><br>


    <span><a href="profil.php?id=<?= $articles['id']?>"><?php echo $articles['pseudo'] ?></span><br><br>

    <span><?php echo $articles['age'] ?></span><br> <br>

 
    
</a>





    <?php endforeach; ?>
</section>
 
