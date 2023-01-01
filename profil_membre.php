<?php
require 'require/database.php';
include './includes/init.php';
include 'verif.php'; // BDD AND SESSION
require_once __DIR__ . "/model/repository/user.repository.php";

$usersWithDesire = UserRepository::findUsersWithDesire();
?>

<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="./assets/profil_membre.css">
<link rel="stylesheet" href="assets/modal.css">
<link rel="stylesheet" href="assets/loader.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les profils chanderland</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>


    <?php

    ?>



    <?php include 'includes/requete_search_form.php' ?>



    <!-- a placer pour aller sur profil <li class="items"><a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon Profil</a> 

-->

    <nav class="navbar">

        <a class="logo_nav" href="profil_membre.php">Chanderland</a>
        <div class="nav-links">
            <ul>

                <li> <a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">
                        <span style="font-size:1.2em;" class="filter_nav"> Mon profil</span>
                </li></a>


                <li>
                    <a id="myBtn" href="#">
                        <!--<img class="icon_search" src="icones/chanderland_search.svg" alt="chanderland">-->
                        <span class="filter_nav">Filtre</span>
                </li></a>


                <li><a title="profil_membre" href="deconnexion.php?id=<?= $_SESSION['id'] ?>">
                        <span style="color: red;" class="filter_nav">Déconnexion</span>
                </li></a>



        </div>


        <img class="menu_humb_nav" src="icones/chanderland_menu.svg" alt="chanderland_menu">



        <div id="myModal" class="modal">
            <div class="close"><span class="close">&times;</span></div> <br>

            <?php include 'includes/form_search.php' ?>
        </div> <!-- Fin modal-->



    </nav>


    <header>


    </header>

    <div class="to_go_header">
        <img src="icones/to_go.svg" class="icone_to_go">
    </div>





    <!-- le conteneur des cards des profils qui ont appuyé sur un bouton d'envie -->
    <?php
    if (!empty($usersWithDesire)) {
        //On parcour chaque utilisateur ayant renseigné une envie
        foreach ($usersWithDesire as $userWithDesire) {
            /*
                    Désormais l'utilisateur qu'on est en train de traiter est accessible avec la variable $userWithDesire
                    Si on veut récupérer
                    son login: $userWithDesire->getLogin()
                    son avatar : $userWithDesire->getAvatar()
                    son envie : $userWithDesire->getDesire()->getText()
                    son age : $userWithDesire->getAge()
                    son département : $userWithDesire->getDepartment()
                */

        ?>
            <h4 class="title_card_choix">Ils désirs faire quelques chose.</h4>

            <ul class="container_card_profil_choix">

                <li class="container_profil_membre" data-sexe="<?= $userWithDesire->getSexe() ?>" data-age="<?= $userWithDesire->getAge() ?>" data-dpt="<?= $userWithDesire->getDepartment() ? $userWithDesire->getDepartment() : "" ?>">
                    <a href="profil.php?id=<?= $userWithDesire->getId() ?>">
                        <div class="container_profil_info">


                            <div class="container_profil_avatar">
                                <?php
                                if (str_contains($userWithDesire->getAvatar(), 'https')) { ?>
                                    <img src="<?php echo $userWithDesire->getAvatar(); ?>" alt="photo_profil"><br>
                                <?php
                                } else {
                                    if (!file_exists("membres/avatars/" . $userWithDesire->getAvatar())) {
                                        $userWithDesire->setAvatar("default.jpg");
                                    }
                                ?>
                                    <img src="membres/avatars/<?php echo $userWithDesire->getAvatar(); ?>" alt="photo_profil"><br>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="container_profil_info_pseudo">
                                <h2><?php echo $userWithDesire->getLogin() ?>
                                    <span class="age_profil_membre"><?php echo $userWithDesire->getAge() ?></span> <br>
                                    <span style="font-size: 12px;">Département : <?php echo $userWithDesire->getDepartment() ?></span>

                                </h2>

                                <div></div>
                            </div>

                        </div>
                        <div class="profil_desire">
                            <?= $userWithDesire->getDesire()->getText(); ?>

                        </div>
                    </a>
                </li>
            </ul>
        <?php
        }
    }
    ?>










    <section class="hero_index">

        <?php
        if (count($articles) == 0) {
            echo 'Aucun resultat trouvé';
        }
        ?>


        <?php foreach ($articles as $article) : ?>

            <?php
            $reqdpt = $bdd->prepare("SELECT *
                         FROM departement
                         WHERE departement_code = ?");
            $reqdpt->execute([$article['departement_nom']]);
            // RECUPERE LES DONEES 
            $departement = $reqdpt->fetch();

            $reqville = $bdd->prepare("SELECT *
                         FROM villes_france
                         WHERE ville_id = ?");
            $reqville->execute([$article['ville_id']]);
            // RECUPERE LES DONEES 
            $ville = $reqville->fetch();
            ?>


            <div class="container_profil_membre" data-sexe="<?= $article['sexe'] ?>" data-age="<?= $article['age'] ?>" data-dpt="<?= $departement ? $departement['departement_nom'] : "" ?>">
                <a href="profil.php?id=<?= $article['id'] ?>">


                    <div class="container_profil_info">


                        <div class="container_profil_avatar">
                            <?php
                            if (str_contains($article['avatar'], 'https')) { ?>
                                <img src="<?php echo $article['avatar']; ?>" alt="photo_profil"><br>
                            <?php
                            } else {
                                if (!file_exists("membres/avatars/" . $article['avatar'])) {
                                    $article['avatar'] = "default.jpg";
                                }
                            ?>
                                <img src="membres/avatars/<?php echo $article['avatar']; ?>" alt="photo_profil"><br>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="container_profil_info_pseudo">
                            <h2><?php echo $article['pseudo'] ?>
                                <span class="age_profil_membre"><?php echo $article['age'] ?></span>
                            </h2>

                            <div></div>
                        </div>

                    </div>

                    <!-- info profil -->

                    <div class="info_profil_pseudo&nom_dpt">

                        <div class="dpt_age">

                            <div class="container_profil_info_dtp">

                                <?php
                                if ($reqdpt->rowCount() > 0) {
                                    echo $departement['departement_nom'] . ' (' . $article['departement_nom'] . ') ';
                                } ?>

                                <br>

                                <?php


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
                            <?php echo $article['description_profil'] ?>
                        </div>

                    </div>


                </a>
            </div>



        <?php endforeach;
        ?>





    </section>

    <!-- LOADER -->
    <div class="loader-wrapper">
        <div class="loader">

            <div class="container_letter">
                <span class="lettre">C</span>
                <span class="lettre">H</span>
                <span class="lettre">A</span>
                <span class="lettre">R</span>
                <span class="lettre">G</span>
                <span class="lettre">E</span>
                <span class="lettre">M</span>
                <span class="lettre">E</span>
                <span class="lettre">N</span>
                <span class="lettre">T</span>
            </div>
        </div>


    </div>



</body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    const menuHamburger = document.querySelector(".menu_humb_nav")
    const navLinks = document.querySelector(".nav-links")

    menuHamburger.addEventListener('click', () => {
        navLinks.classList.toggle('mobile-menu')
    })

    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
    })
</script>
<script src="js/modal.js"> </script>
<script src="js/to_go.js"> </script>


</html>