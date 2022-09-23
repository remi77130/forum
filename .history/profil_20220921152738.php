<?php
include 'verif.php'; // BDD AND SESSION

if (isset($_GET['id']) and $_GET['id'] > 0) {

    include 'includes/get_message.php';

    // On vient gérer si un utilisateur poste une nouvelle photo
    include 'limit_send_album.php';
    ?>

    <html>

    <head>
        
    <?php 
    // On doit inclure toutes les notiions de HTML après les traitements
    include 'includes/head.php';
    ?>

        <link rel="stylesheet" href="assets/profil.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,
wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
                integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

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


    <section class="section_profil_membre">
        <!-- Profil visible-->

        <div class="profil_membre">
            <div>
            <?php 
                if (str_contains($userinfo['avatar'], 'https')) { ?>
                <img src="<?php echo $userinfo['avatar']; ?>" alt="photo_profil"><br>
            <?php
                }else{
            ?>
                <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil"><br>
            <?php
                }
            ?>            
            </div>

            <div class="info_profil">


                <div>
                    <span class="pseudo_profil"><?php echo $userinfo['pseudo']; ?></span>
                    <span class="age_profil"><?php echo $userinfo['age'] ?></span>
                </div>

                <div>
                    <p><?php echo $userinfo['astrologie']; ?></p>
                </div>


                <div class="container_profil_info_pseudo">
                    <span style="font-size: 12px; border-bottom: 1px solid white;">Dpt <?php echo $userinfo['departement_nom'] ?> </span>
                </div>

                <div class="descr_profil">
                    <p>
                        <?php echo $userinfo['description_profil']; ?>
                    </p>
                </div>

                <div class="created_profil">
                    <p>
                        <?php echo "profil crée le " . $userinfo['createdAt']; ?>
                    </p>
                </div>

            </div>

        </div>


        <!-- dislike en cours --->$_COOKIE
        <a href="actions/action.php?t=like&id=<?= $id ?>">J'aime</a>(15) <br>
        <a href="actions/action.php?t=dislike&id=<?= $id ?>">J'aime pas</a>(1)


        <?php if (isset($error)) {
            echo '<span style="color:red;">' . $error . '</span>';
        }
        ?>

        <div class="option_profil_user">
            <a href="profil_membre.php">Acceuil</a>
        </div>
        <?php
        if ($_SESSION['id'] != $userinfo['id']) {
            ?>

<button class="button_write_profil" style="cursor: pointer;">
<a onClick="messagerie()">Ecrire</a>

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

                    <form method="POST">
                        <label style="display:block">Objet:</label>

                        <input class="input_object_form_profil" type="submittext" name="objet" <?php if (isset($o)) {
                            echo 'value="' . $o . '"';
                        } ?> /> </br>
                        <label style="display:block"> Pièce jointe : </label><br><br>

                        <input class="input_file_form_profil" type="file" name="img_msg"> <br><br>

                        <label style="display:block;"> Ecrire un message : </label><br>
                        <textarea placeholder="Votre message" name="message"></textarea><br>

                        <input class="input_submit_form_profil" type="submit" value="Envoyer" name="envoi_message"/>

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
        $req = $bdd->prepare("SELECT nom, type from images INNER JOIN membres on membres.id=images.id WHERE membres.id=?");
        // REQUETE DE SELECTION DANS LA BDD JOINTURE DE TABLES
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute(array($_GET["id"]));
        $tab = $req->fetchAll();
        ?>

        <!-- LOOP : AFFICHE DES IMAGES -->

        <?php // AFFICHAGE IMAGES ALBUM
        include 'Images_album.php';

        ?>


        <!----LIKE DISLIKE EN COURS DE DEV


<a href="actions/action.php?t=1&id=<?= $id ?>">J'aime</a> (15) <br> <br>  t pour le type d'action <br>
<a href="actions/action.php?t=2&id=<?= $id ?>">Je n'aime pas </a>(5) <br> ---->


        <!--//////////////////// FICHE PROFIL PRIVEE USERS CONNECT    ///////////////////---->

        <?php
        if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) { // SI USER CONNECT


        ?>
        <!---   FORM ENVOIE PHOTO ALBUM -------->
        <?php include 'form_send_album_profil.html'; ?>
        <?php include 'option_profil.php'; ?>

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

        <?php
        include 'comment.php';
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