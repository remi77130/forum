<?php
include 'verif.php'; // BDD AND SESSION
include 'includes/head.php';
?>


<?php
if (isset($_GET['id']) and $_GET['id'] > 0) {
?>
   <?php include 'includes/get_message.php'; ?>

   <html>

   <head>

      <link rel="stylesheet" href="assets/profil.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

      <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,
wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

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

   
<div class="w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 block" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(476px, 83.2px, 0px);">
            <ul class="py-1" aria-labelledby="dropdownButton">
            <li>
                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
            </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center pb-10">
        <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
        <span class="text-sm text-gray-500 dark:text-gray-400">Visual Designer</span>
        <div class="flex mt-4 space-x-3 md:mt-6">
            <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add friend</a>
            <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
        </div>
    </div>
</div>


      <section class="section_profil_membre">
         <!-- Profil visible-->

         <div class="profil_membre">
            <div>
               <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil"><br>
            </div>

            <div class="info_profil">

               <div>
                  <h2><?php echo $userinfo['pseudo']; ?></h2>
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

         <?php if (isset($error)) {
            echo '<span style="color:red">' . $error . '</span>';
         }
         ?>

         <div class="option_profil_user">
            <a href="profil_membre.php">Acceuil</a>

            <?php
            if ($_SESSION['id'] != $userinfo['id']) {
            ?>

               <a onClick="messagerie()">Ecrire</a>

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
                        <label style="display:block"> Pièce jointe : </label><br>

                        <input class="input_file_form_profil" type="file" name="img_msg"> <br><br>

                        <label style="display:block"> Ecrire un message : </label><br>
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

         <!---- AJOUT PHOTO ALBUM --->

         <?php include 'limit_send_album.php'; ?>


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