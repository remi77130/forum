<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./assets/profil_membre.css">
<link rel="stylesheet" href="assets/modal.css">


<?php include 'includes/head.php';?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>


<?php

require 'require/database.php';
include 'profil.php';

?>




<?php

$requser = "SELECT * FROM membres ORDER BY id";
$requete = $bdd->query($requser);
$articles = $requete->fetchAll(); 

?>



<!-- a placer pour aller sur profil <li class="items"><a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a> 

-->

<nav class="navbar">

<a class="logo_nav" href="#">Chanderland</a>
<div class="nav-links">
    <ul>
    <li><a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a></li> <br>

    <a id="myBtn" href="#">Filtre</a>
    

</div>

<img class="menu_humb_nav" src="icones/chanderland_menu.svg" alt="chanderland_menu">



<div id="myModal" class="modal">

<div class="modal-content">
    <span class="close">&times;</span>
    
    <form action="">

    <label for="">Homme</label>
    <input type="checkbox" name="H"> <br> 
    
    <label for="">Femme</label>
    <input type="checkbox" name="F">






    <button class="btn_submit">Enregistrer</button>

    </form>

</div>

</div>
    


</nav>


<header>


</header>


<?php include 'includes/search.php'; ?> <!-- Bar de recherche -->

<div class="container" js-filter>
    <div class="row">
        <div class="col-md-3" js-filter-form>
            
        </div>
    </div>
</div>




<section class="hero_index">

    <?php foreach ($articles as $articles) : ?>

        <?php
        $reqdpt = $bdd->prepare("SELECT *
                         FROM departement
                         WHERE departement_code = ?");
        $reqdpt->execute([$articles['departement_nom']]);
// RECUPERE LES DONEES 
        $departement = $reqdpt->fetch();

        $reqville = $bdd->prepare("SELECT *
                         FROM villes_france
                         WHERE ville_id = ?");
        $reqville->execute([$articles['ville_id']]);
// RECUPERE LES DONEES 
        $ville = $reqville->fetch();
        ?>


        <div class="container_profil_membre">
            <a href="profil.php?id=<?= $articles['id'] ?>">


                <div class="container_profil_info">


                    <div class="container_profil_avatar">
                        <?php
                        if (str_contains($articles['avatar'], 'https')) { ?>
                            <img src="<?php echo $articles['avatar']; ?>" alt="photo_profil"><br>
                            <?php
                        } else {
                            ?>
                            <img src="membres\avatars/<?php echo $articles['avatar']; ?>" alt="photo_profil"><br>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="container_profil_info_pseudo">
                        <h2><?php echo $articles['pseudo'] ?>
                            <span class="age_profil_membre"><?php echo $articles['age'] ?></span></h2>

                        <div></div>
                    </div>

                </div>

                <!-- info profil -->

                <div class="info_profil_pseudo&nom_dpt">

                    <div class="dpt_age">

                        <div class="container_profil_info_dtp">

                            <?php
                            if ($reqdpt->rowCount() > 0) {
                                echo $departement['departement_nom'] . '(' . $articles['departement_nom'] . ') - ';
                            }

                            if ($reqville->rowCount() > 0) {
                                echo $ville['ville_nom_reel'];
                                echo '</span>';
                            } else {
                                echo '</span>';
                            }

                            ?>
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

    <script>

const menuHamburger = document.querySelector(".menu_humb_nav")
        const navLinks = document.querySelector(".nav-links")
 
        menuHamburger.addEventListener('click',()=>{
        navLinks.classList.toggle('mobile-menu')
        })
        
    </script>
<script src="js/modal.js"> </script>


</html>