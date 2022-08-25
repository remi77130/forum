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
               
               
               <div>
                  <p><?php echo $userinfo['astrologie']; ?></p>
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

               <div>
               <select name="country_code" onchange="regionsRequest('ajaxProxy.php?mode=getRegionsList', this.value)" class="iSelect" tabindex="10" required="">

<option value="-1">---</option>

<option value="CH">Suisse</option>
<option value="FR">France</option>
<option value="BE">Belgique</option>
<option value="CA">Canada</option>

<option value="-1">---</option>

<option value="AF">Afghanistan</option>
<option value="ZA">Afrique du Sud</option>
<option value="AL">Albanie</option>
<option value="DZ">Algérie</option>
<option value="DE">Allemagne</option>
<option value="AD">Andorre</option>
<option value="GB">Angleterre</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AG">Antigua et Barbuda</option>
<option value="AN">Antilles néerlandaises</option>
<option value="SA">Arabie saoudite</option>
<option value="AR">Argentine</option>
<option value="AM">Arménie</option>
<option value="AW">Aruba</option>
<option value="AU">Australie</option>
<option value="AT">Autriche</option>
<option value="AZ">Azerbaïdjan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahreïn</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbade</option>
<option value="BY">Bélarus</option>
<option value="BE">Belgique</option>
<option value="BZ">Belize</option>
<option value="BJ">Bénin</option>
<option value="BM">Bermudes</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivie</option>
<option value="BA">Bosnie-Herzégovine</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brésil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BN">Brunei Darussalam</option>
<option value="BG">Bulgarie</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodge</option>
<option value="CM">Cameroun</option>
<option value="CA">Canada</option>
<option value="CV">Cap-Vert</option>
<option value="CF">Centrafique</option>
<option value="CL">Chili</option>
<option value="CN">Chine</option>
<option value="CX">Christmas Island</option>
<option value="CY">Chypre</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombie</option>
<option value="KM">Comores</option>
<option value="CG">Congo Brazzaville</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Côte d'Ivoire</option>
<option value="HR">Croatie</option>
<option value="CU">Cuba</option>
<option value="DK">Danemark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominique</option>
<option value="EG">Egypte</option>
<option value="SV">El Salvador</option>
<option value="AE">Emirats Arabes Unis</option>
<option value="EC">Équateur</option>
<option value="ER">Érythrée</option>
<option value="ES">Espagne</option>
<option value="EE">Estonie</option>
<option value="US">Etats-Unis</option>
<option value="ET">Éthiopie</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FJ">Fiji</option>
<option value="FI">Finlande</option>
<option value="FR">France</option>
<option value="GA">Gabon</option>
<option value="GM">Gambie</option>
<option value="GE">Géorgie</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Grèce</option>
<option value="GD">Grenade</option>
<option value="GL">Groenland</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GF">Guinée</option>
<option value="GN">Guinée</option>
<option value="GQ">Guinée équatoriale</option>
<option value="GW">Guinée-Bissau</option>
<option value="GY">Guyane</option>
<option value="HT">Haïti</option>
<option value="HM">Heard Island and Mcdonald Islands</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hongrie</option>
<option value="MU">Ile Maurice</option>
<option value="MP">Île Norfolk</option>
<option value="SH">Île Sainte-Hélène</option>
<option value="KY">Îles Caïmans</option>
<option value="FO">Îles Féroé</option>
<option value="MH">Îles Marshall</option>
<option value="PN">Îles Pitcairn</option>
<option value="PM">Iles Saint-Pierre et Miquelon</option>
<option value="SB">Îles Salomon</option>
<option value="TC">Iles Turques et Caïques</option>
<option value="VI">Îles Vierges américaines</option>
<option value="VG">Îles Vierges britanniques</option>
<option value="IN">Inde</option>
<option value="ID">Indonésie</option>
<option value="IQ">Irak</option>
<option value="IR">Iran</option>
<option value="IE">Irlande</option>
<option value="IS">Islande</option>
<option value="IL">Israël</option>
<option value="IT">Italie</option>
<option value="JM">Jamaïque</option>
<option value="JP">Japon</option>
<option value="JO">Jordanie</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KG">Kirghizistan</option>
<option value="KI">Kiribati</option>
<option value="KW">Koweït</option>
<option value="LA">Laos</option>
<option value="LS">Lesotho</option>
<option value="LV">Lettonie</option>
<option value="LB">Liban</option>
<option value="LR">Liberia</option>
<option value="LY">Libye</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lituanie</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macédoine</option>
<option value="MG">Madagascar</option>
<option value="MY">Malaisie</option>
<option value="MW">Malawi</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malte</option>
<option value="MA">Maroc</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritanie</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexique</option>
<option value="FM">Micronésie</option>
<option value="MD">Moldavie</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolie</option>
<option value="MS">Montserrat</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibie</option>
<option value="NR">Nauru</option>
<option value="NP">Népal</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigéria</option>
<option value="NU">Niue</option>
<option value="NO">Norvège</option>
<option value="NC">Nouvelle-Calédonie</option>
<option value="NZ">Nouvelle-Zélande</option>
<option value="OM">Oman</option>
<option value="UG">Ouganda</option>
<option value="UZ">Ouzbékistan</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestine</option>
<option value="PA">Panama</option>
<option value="PG">Papouasie-nouvelle-Guinée</option>
<option value="PY">Paraguay</option>
<option value="NL">Pays-Bas</option>
<option value="PE">Pérou</option>
<option value="PH">Philippines</option>
<option value="PL">Pologne</option>
<option value="PF">Polynésie française</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="KR">République de Corée (Corée du Sud)</option>
<option value="CD">République démocratique du Congo</option>
<option value="DO">République dominicaine</option>
<option value="KP">République populaire démocratique de Corée</option>
<option value="CZ">République Tchèque</option>
<option value="RE">Réunion</option>
<option value="RO">Roumanie</option>
<option value="RU">Russie</option>
<option value="RW">Rwanda</option>
<option value="EH">Sahara Occidental</option>
<option value="KN">Saint-Kitts-et-Nevis (Saint-Christophe-et-Niévès)</option>
<option value="SM">Saint-Marin</option>
<option value="VC">Saint-Vincent-et-les Grenadines</option>
<option value="LC">Sainte-Lucie</option>
<option value="WS">Samoa</option>
<option value="AS">Samoa américaines</option>
<option value="SN">Sénégal</option>
<option value="CS">Serbie &amp; Montenegro</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapour</option>
<option value="SK">Slovaquie</option>
<option value="SI">Slovénie</option>
<option value="SO">Somalie</option>
<option value="SD">Soudan</option>
<option value="LK">Sri Lanka</option>
<option value="SE">Suède</option>
<option value="CH">Suisse</option>
<option value="SR">Surinam</option>
<option value="SZ">Swaziland</option>
<option value="SY">Syrie</option>
<option value="TJ">Tadjikistan</option>
<option value="TW">Taiwan</option>
<option value="TZ">Tanzanie</option>
<option value="TD">Tchad</option>
<option value="TF">Territoires Français du sud</option>
<option value="TH">Thaïlande</option>
<option value="TL">Timor oriental</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinité-et-Tobago</option>
<option value="TN">Tunisie</option>
<option value="TM">Turkménistan</option>
<option value="TR">Turquie</option>
<option value="TV">Tuvalu</option>
<option value="UA">Ukraine</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="VU">Vanuatu</option>
<option value="VA">Vatican</option>
<option value="VE">Venezuela</option>
<option value="VN">Vietnam</option>
<option value="WF">Wallis-et-Futuna</option>
<option value="YE">Yémen</option>
<option value="ZM">Zambie</option>
<option value="ZW">Zimbabwe</option>
               </div>

            </div>

         </div>

         <?php if (isset($error)) {
            echo '<span style="color:red;">' . $error . '</span>';
         }
         ?>

         <div class="option_profil_user">
            <a href="profil_membre.php">Acceuil</a>

            <?php
            if ($_SESSION['id'] != $userinfo['id']) {
            ?>

               <a style="cursor: pointer;" onClick="messagerie()">Ecrire</a>

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

                        <label  style="display:block;"> Ecrire un message : </label><br>
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