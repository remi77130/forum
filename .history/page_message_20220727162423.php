<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'includes/head.php';
?>



<?php
         if($_SESSION['id'] != $userinfo['id']){
      ?>         
       <form method="POST">
        <label style="display:block">Objet:</label>

         <input class="input_object_form_profil" type="submittext" name="objet" <?php if(isset($o)) {  echo 'value="'.$o.'"'; } ?> /> </br>
         <label style="display:block">  Pièce jointe : </label><br>

         <input class="input_file_form_profil" type="file" name="img_msg"> <br><br>

         <label style="display:block">  Ecrire un message : </label><br>
         <textarea placeholder="Votre message" name="message"></textarea><br>

         <input class="input_submit_form_profil" type="submit" value="Envoyer" name="envoi_message" />

        </form>
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; 
         
         } 
         ?>

        <?php

         }



      ?> 