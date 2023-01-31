<?php
include './includes/init.php';
include 'verif.php'; // BDD AND SESSION
require_once __DIR__ . "/model/repository/desire.repository.php";
require_once __DIR__ . "/model/repository/user.repository.php";
require_once __DIR__ . "/model/repository/like.repository.php";

$desires = DesireRepository::findAll();
// Si l'utilisateur n'est pas connecté
if (empty($_SESSION)) {
    exit;
}






if (isset($_GET['id']) and $_GET['id'] > 0) {
    $user = UserRepository::findById($_GET['id'], true);
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    $hasLike = LikeRepository::hasLikeUser($_SESSION['id'], $_GET['id']);

    // Si un message est envoyé sur un profil
    if (!empty($_POST['envoi_message']) && !empty($_FILES)) {
        $error = send_message($_POST['destinataire_id'], $_POST, $_FILES['img_msg']);
    }

    // On vient gérer si un utilisateur poste une nouvelle photo
    include 'limit_send_album.php';

?>


    <html>

    <head>

        <link rel="stylesheet" href="assets/navbar.css">
        <link rel="stylesheet" href="assets/image_viewer.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="assets/modal.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Unbounded&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/profil.css">



        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profi chanderland</title>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

        <script>
            function messagerie() {
                if ($("#messagerie").hasClass("active")) {
                    $("#messagerie").removeClass("active");
                } else {
                    console.log("here");
                    $("#messagerie").addClass("active");
                }
            }
        </script>
    </head>

    <body>



        <?php include 'includes/header.php' ?>




        <section class="section_profil_membre">
            <!-- Profil visible-->

            <div class="container_avatar">

                <div class="avatar_profil">
                    <!-- Avatar -->
                    <?php
                    if (str_contains($userinfo['avatar'], 'https')) { ?>
                        <img src="<?php echo $userinfo['avatar']; ?>" alt="photo_profil"><br>
                    <?php
                    } else {
                    ?>
                        <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil"><br>
                    <?php
                    }
                    ?>


                </div>
            </div>
            <div class="card__header_text">
                <div class="container_text">
                    <h3 class="card__title">
                        <?php echo $userinfo['pseudo']; ?>


                        <!-- Ici svg connect fake -->
                        <span><img class="connect_svg_profil" src="icones/connect_svg_green.svg">
                        </span>



                        <!-- ici svg connect reel 
                                        <?php
                                        if ($user->isOnline()) {
                                        ?>
                                            <span><img class="connect_svg_profil" src="icones/connect_svg_green.svg"></span>
                                        <?php
                                        }
                                        ?>
                                                -->

                    </h3>
                    <span style="font-size: 12px; "> <?php echo $userinfo['age'] ?> ans</span> <br>
                    <span class="card__status"><?php echo $userinfo['situation']; ?>


                    </span>

                    <p class="card__description"><?php echo $userinfo['description_profil']; ?></p> <br>

                    <!-- Bouton like rendre visible seulement par les autres users -->

                    <a href="" class="like_button" data-user-id="<?php echo $userinfo['id'] ?>">
                        <img class="img_not_liked<?= $hasLike?" hide":""?>" src="images/icones/like.svg" alt="">
                        <img class="img_liked<?= !$hasLike?" hide":""?>" src="images/icones/like_2.svg" alt="">
                    </a>

                    <!--<img  style="width: 20px;" class="like-button" src="images/icones/like_2.svg" alt="" srcset="">-->
                </div>
            </div>

            <div class="line_separate">

            </div>

            <button id="toggleButton" class="button_info_profil">Afficher/cacher les infos</button>



            <div id="content" class="info_profil" style="display: block;"> <!-- Info profil rendre visible seulement si rempli -->
                <div class="container_info">

                    <ul>
                        <?= $userinfo['taille'] ? "<li>Taille : " . $userinfo['taille'] . "</li>" : "" ?>
                        <?= $userinfo['poids'] ? "<li>Poids : " . $userinfo['poids'] . "</li>" : "" ?>
                        <?= $userinfo['situation'] ? "<li>Situation : " . $userinfo['situation'] . "</li>" : "" ?>
                        <?= $userinfo['nationality'] ? "<li>Nationalité : " . $userinfo['nationality'] . "</li>" : "" ?>
                        <?= $userinfo['choix'] ? "<li>Choix : " . $userinfo['choix'] . "</li>" : "" ?>
                        <?= $userinfo['sexualite'] ? "<li>Sexualité : " . $userinfo['sexualite'] . "</li>" : "" ?>
                        <?= $userinfo['astrologie'] ? "<li>Astrologie : " . $userinfo['astrologie'] . "</li>" : "" ?>
                        <?= $userinfo['cheveux_color'] ? "<li>Cheveux : " . $userinfo['cheveux_color'] . "</li>" : "" ?>
                    </ul>
                </div>
            </div>


            <?php if (isset($error)) {
                echo '<span style="color:red;">' . $error . '</span>';
            }
            ?>

            <div class="option_profil_user">
                <a href="profil_membre.php">Accueil</a>
            </div>

            <?php
            if ($_SESSION['id'] != $userinfo['id']) {
            ?>
                <button class="button_write_profil" style="cursor: pointer;">

                    <a class="write" onClick="messagerie()">
                        <img class="icone_letter_profil" src="icones/letter.svg "></a>
                </button>
            <?php
            }
            ?>
            <?php
            if ($_SESSION['id'] != $userinfo['id']) {
            ?>
                <!-- MESSAGERIE  -->
                <div class="parent_message_profil_user" id="messagerie">

                    <div class="message_profil_user">

                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="destinataire_id" value="<?= $userinfo['id']; ?>">

                            <label style="display:block">Objet</label>

                            <input class="input_object_form_profil" type="submittext" name="objet" <?php if (isset($o)) {
                                                                                                        echo 'value="' . $o . '"';
                                                                                                    } ?> /> </br>
                            <label class="pjointe" style="display:block"> Pièce jointe</label><br><br>

                            <input class="input_file_form_profil" type="file" name="img_msg"> <br><br>

                            <label style="display:block;"> Ecrire un message</label><br>
                            <textarea placeholder="Votre message" name="message"></textarea><br>

                            <input class="input_submit_form_profil" type="submit" value="Envoyer" name="envoi_message" />

                        </form>
                    </div>
                    <!--FIN MESSAGERIE  -->
                </div>
                <!--FIN PARENT MESSAGERIE  -->

                </div>

            <?php
            }
            ?>

            </div>

            <!------------------------ REQUETE AFFICHAGE ALBUM PHOTO -------->

            <?php
            $req = $bdd->prepare("SELECT `index`, nom, type from images INNER JOIN membres on membres.id=images.id WHERE membres.id=?");
            // REQUETE DE SELECTION DANS LA BDD JOINTURE DE TABLES
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($_GET["id"]));
            $tab = $req->fetchAll();
            ?>

            <div class="image_album_profil">
                <?php
                foreach ($tab as $image) {
                    if (file_exists('Images_album/' . $image["nom"])) {
                ?>
                        <div class="image_container" data-image-id="<?= $image["index"] ?>">
                            <div class="images_action">
                                <a href="#" data-image-id="<?= $image["index"] ?>" class="btn_image_delete">Supprimer</a>
                            </div>
                            <div class="images">
                                <img src="Images_album/<?= $image["nom"] ?>" alt="photo album" title="image" />
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <div id="image-viewer">
                <span class="close">&times;</span>
                <img class="modal-content" id="full-image">
            </div>

            <!--//////////////////// FICHE PROFIL PRIVEE USERS CONNECT    ///////////////////---->

            <?php
            if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) { // SI USER CONNECT


            ?>
                <!---   FORM ENVOIE PHOTO ALBUM -------->
                <?php include 'form_send_album_profil.php'; ?>
                <?php include 'option_profil.php'; ?>

                <div class="line_01"> </div>


                <p>Dite à tout le monde de quoi avez-vous envie maintenant !</p> <br>

                <h3>J'ai envie de </h3> <br> <br> <b></b>

                <!-- Timer -->
                <div id="desire_timer" data-init="<?= $user->getDesireRestTime() ?>" class="<?= $user->getDesireRestTime() == 0 ? 'hidden' : '' ?>">
                </div>
                <!-- Fin Timer -->

                <div class="container_choix">
                    <?php // CE CODE PARCOURS LA TABLE DESIRE POUR AFFICHER LES BOUTONS -->
                    // on ajout/ supp des boutons directement dans la bdd 
                    if (!empty($desires)) {
                        foreach ($desires as $desire) {
                            $selected = ($user->getDesire() != null &&
                                $user->getDesire()->getId() == $desire->getId());
                            $disabled = ($user->getDesire() != null);
                    ?>
                            <button class="noselect <?= $desire->getColor() ?>" data-desire_id="<?= $desire->getId() ?>" data-user_id="<?= $user->getId() ?>" <?= $disabled ? 'data-disabled="disabled"' : '' ?> <?= $selected ? 'data-selected="selected"' : '' ?>>
                                <?= $desire->getText() ?>
                            </button>
                    <?php
                        }
                    }
                    ?>

                </div>




                </div>

                <!-- ON VERIFIE SI LUTILISATEUR N'A PAS DEPASSE LA LIMITE D'ENVOIE D'IMAGE-->

                <?php
                // ON récupère la limitation d'ajout de l'image
                $reqparam = $bdd->prepare('SELECT * FROM param WHERE id = 1');
                $reqparam->execute();
                $param = $reqparam->fetch();
                if (count($tab) < $param['limit_image_album']) { // STARTIF OF LIMIT IMAGE : Si le compteur utilisateur est inférieur à la limitation d'ajout d'image aux albums
                ?>


                <?php
                } else { // ELSE OF LIMIT ALBUM
                ?>
                    <p style="color:red"> Vous avez atteint la limite d'ajout d'images.
                    <p>
                    <?php
                } // ENDIF OF LIMIT ALBUM
                    ?>


                <?php
            }
                ?>


        </section>

        <!-- Commentaires---->
        <div class="comment_profil">


            <h2>Commentaires</h2>

            <form method="POST" action="">

                <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br />

                <input class="input_comment" type="submit" name="submit_commentaire">

            </form>


            <?php
            include 'send_comment.php';

            ?>
        </div>

        <?php

        ?>
        </section>

    </body>


    </html>

<?php
}
?>


<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/profil.js"></script>
<script type="text/javascript" src="./js/image_viewer.js"></script>