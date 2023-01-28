<?php
require 'require/database.php';
include './includes/init.php';
include 'verif.php'; // BDD AND SESSION

$usersWithDesire = UserRepository::findUsersWithDesire();
?>

<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="assets/profil_membre.css">
<link rel="stylesheet" href="assets/modal.css">
<link rel="stylesheet" href="assets/loader.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">

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

    <header>


        <nav class="navbar">

            <div class="container-fluid">
                <a class="navbar-brand" href="profil_membre.php">
                    <img class="avatar_navbar" src="membres/avatars/<?= $_SESSION["user"]->getAvatar() ?>" alt=""></a>

                <a href="profil_membre.php"><img class="logo_navbar" src="icones/logo_navbar.svg" alt="logo-chanderland"></a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="profil_membre.php">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a title="profil_membre" href="profil.php?id=<?= $_SESSION['id'] ?>">Mon profil</a>
                        </li>

                        <li class="nav-item">
                            <a id="myBtn" href="#">Filtre</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                        </li>
                        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Forum</a>
        </li>-->


                        <!-- <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Plus d'options
          </a>

          <ul class="dropdown-menu">

            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>

          </ul>
        </li> nav-item dropdown 
      </ul>dropdown-menu -->

                </div><!-- container-fluid -->
            </div> <!-- collapse navbar-collapse -->


            <div id="myModal" class="modal_search"> <!-- modal recherche -->
                <div class="close">

                    <span class="close">&times;</span>
                </div> <br>

                <?php include 'includes/form_search.php' ?>
            </div> <!-- Fin modal de recherche-->

        </nav>




    </header>




    <!-- le conteneur des cards des profils qui ont appuyé sur un bouton d'envie -->
    <?php
    if (!empty($usersWithDesire)) {
        //On parcour chaque utilisateur ayant renseigné une envie
    ?>

        <h4 class="title_card_choix">Ils désirent faire quelques choses.</h4>

        <ul class="container_card_profil_choix">

            <?php
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

                <li class="container_profil_membre" data-sexe="<?= $userWithDesire->getSexe() ?>" data-age="<?= $userWithDesire->getAge() ?>" data-dpt="<?= $userWithDesire->getDepartment() ? $userWithDesire->getDepartment()->getName() : "" ?>">
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
                                    <span style="font-size: 12px;"><?php echo $userWithDesire->getDepartment()->getName() ?></span>






                                </h2>

                                <div></div>
                            </div>

                        </div>
                        <div class="profil_desire">
                            <?= $userWithDesire->getDesire()->getText(); ?>

                        </div>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    <?php
    }
    ?>










    <section class="hero_index">

        <?php
        if (!$users || count($users) == 0) {
            echo 'Aucun resultat trouvé';
        } else {
        ?>


            <?php foreach ($users as $user) : ?>
                <div class="container_profil_membre" data-sexe="<?= $user->getSexe() ?>" data-age="<?= $user->getAge() ?>" data-dpt="<?= $user->getDepartment()->getName() ?>">
                    <a href="profil.php?id=<?= $user->getId() ?>">


                        <div class="container_profil_info">


                            <div class="container_profil_avatar">
                                <?php
                                if (str_contains($user->getAvatar(), 'https')) { ?>
                                    <img src="<?php echo $user->getAvatar(); ?>" alt="photo_profil"><br>
                                <?php
                                } else {
                                    if (!file_exists("membres/avatars/" . $user->getAvatar())) {
                                        $user->setAvatar("default.jpg");
                                    }
                                ?>
                                    <img src="membres/avatars/<?php echo $user->getAvatar(); ?>" alt="photo_profil"><br>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="container_profil_info_pseudo">
                                <h2><?php echo $user->getLogin(); ?>
                                    <span class="age_profil_membre"><?php echo $user->getAge(); ?></span> <br>

                                </h2>

                            </div>

                        </div>

                        <!-- info profil -->

                        <div class="info_profil_pseudo&nom_dpt">

                            <div class="dpt_age">

                                <div class="container_profil_info_dtp">


                                    <?php
                                    if ($user->getDepartment()) {
                                        echo $user->getDepartment()->getName() . ' (' . $user->getDepartment()->getCode() . ') ';
                                    } ?>

                                    <br>

                                    <?php


                                    if ($user->getCity()) {
                                        echo $user->getCity()->getName();
                                        echo '</span>';
                                    } else {
                                        echo '</span>';
                                    }

                                    ?> <br>

                                    <!-- Ici svg connect fake -->
                                    <span><img style="width: 12px; margin-top:5px;" class="connect_svg_profil" src="icones/connect_svg_green.svg">
                                    </span>


                                    <!-- Ici le svg connect reel
                                <?php
                                if ($user->isOnline()) {
                                ?>
                                    <span><img src="icones/connect_svg_green.svg" alt="" class="svg_conect"></span>
                                <?php
                                }
                                ?>-->

                                </div>


                            </div>


                            <div class="container_profil_info_descr">
                                <?php echo $user->getDescription() ?>
                            </div>

                        </div>


                    </a>
                </div>
        <?php endforeach;
        }
        ?>





    </section>

    <!-- LOADER 
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


    </div>-->



</body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
    /*const menuHamburger = document.querySelector(".menu_humb_nav")
    const navLinks = document.querySelector(".nav-links")

    menuHamburger.addEventListener('click', () => {
        navLinks.classList.toggle('mobile-menu')
    })*/

    $(window).on("load", function() {
        $(".loader-wrapper").fadeOut("slow");
    })
</script>
<script src="js/modal.js"> </script>
<!--<script src="js/to_go.js"> </script>-->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>



</html>