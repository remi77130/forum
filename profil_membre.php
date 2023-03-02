<?php
require 'require/database.php';
include './includes/init.php';
include 'verif.php'; // BDD AND SESSION

$usersWithDesire = UserRepository::findUsersWithDesire();
?>

<!-- Page affichage des membres -->
<!DOCTYPE html>
<html lang="fr">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/navbar.css">
    <link rel="stylesheet" href="assets/profil_membre.css">
    <link rel="stylesheet" href="assets/modal.css">
    <link rel="stylesheet" href="assets/loader.css">

    <title>Les profils chanderland</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>
    <?php ?>



    <?php include 'includes/requete_search_form.php' ?>

    <?php include 'includes/header.php' ?>





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
                                    <span class="age_profil_membre">
                                        <?php echo $userWithDesire->getAge() ?></span> <br>
                                    <span style="font-size: 12px;">
                                        <?php echo $userWithDesire->getDepartment()->getName() ?></span>

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






    <div class="filter d-flex flex-row-reverse">
        <!-- Button trigger modal -->
        <button type="button" class="btn_filter" data-bs-toggle="modal" data-bs-target="#filterModal">
            Filtre
        </button>
    </div>
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
                                    <span class="age_profil_membre"><?php echo $user->getAge(); ?>
                                    </span> <br>

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
        <div id="pagination">
            <ul>
                <?php
                for ($i = 1; $i <= $page_counter; $i++) {
                ?>
                    <li><a href="?page=<?= $i; ?>" class="<?= ($current_page==$i)?"active":""?>"><?= $i; ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>

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



    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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


    <!-- Modal -->
    <div class="modal fade " id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true" data-bs-theme="dark">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtrer les membres</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php include 'includes/form_search.php' ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnModalReset" data-bs-dismiss="modal">Réinitialiser le filtre</button>
                    <button type="button" class="btn btn-primary" id="btnModalApply">Appliquer le filtre</button>
                </div>
            </div>
        </div>
    </div>
</body>


</html>