<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
include 'includes/head.php';
include 'includes/get_message.php';
?>


<?php
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   

   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

   if(isset($_POST['envoi_message'])) {
      if(isset($_POST['message'],$_POST['objet']) 
      AND !empty($_POST['message']) 
      AND !empty($_POST['objet'])) 
      {
         $destinataire = $userinfo['pseudo'];
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);
         $img_msg = htmlspecialchars($_POST['img_msg']);
         $id_destinataire = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ?');
         $id_destinataire->execute(array($destinataire));
         $dest_exist = $id_destinataire->rowCount();



         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
            


            try {
               $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet,img_msg) VALUES (?,?,?,?,?)');
               $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$objet,$img_msg));
            }
           catch(Exception $e) {
               echo 'Exception -> ';
               var_dump($e->getMessage());
                // hello 
           }
           //mettrev ici la requete select
            $error = "Votre message a bien été envoyé !";
         } else {
            $error = "Cet utilisateur n'existe pas...";
         }
      } else {
         $error = "Veuillez compléter tous les champs";
      }
      
   }
   

?>

<html>

<head>

   <body>



<!-- MESSAGERIE  -->
<div class="message_profil_user">

<a href="page_message.php">Ecrire</a>
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
