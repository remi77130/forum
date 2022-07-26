<?php                 ////// FEUILLE ENVOI DU MESSAGE *********->RECEPTION.PHP
                     
session_start(); //pour recup dans la bdd
require 'require/database.php';

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
   if(isset($_POST['envoi_message'])) {
      if(isset($_POST['destinataire'],$_POST['message'],$_POST['objet']) 
      AND !empty($_POST['destinataire']) AND !empty($_POST['message']) 
      AND !empty($_POST['objet'])) 
      {
         $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);

         // Recuperation fichier 
         $img_msg = $_FILES['img_msg']['name'];
         // Source
         $target_dir = "images/";

         $temp_name = $_FILES['img_msg']['tmp_name'];
         // Target fichier
         $target_file = $target_dir . basename($_FILES["img_msg"]["name"]);

         // Type fichier
         $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         // Extension valide
         $extensions_arr = array("jpg", "jpeg", "png", "gif");

         $isSaved = false;
         if(move_uploaded_file($temp_name, 'images/'.$img_msg)){ // Si le fichier a été enregistrer 
                                                            //dans le dossier mettre isSaved à true 
                                                            //pour enregistrer une image
            $isSaved = true;
         }

         $id_destinataire = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ?');
         $id_destinataire->execute(array($destinataire));

         $dest_exist = $id_destinataire->rowCount();
         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];

            if($isSaved == true)
            {
               $image_base64 = base64_encode(file_get_contents('images/'.$img_msg) ); // IMG CONVERT EN base64
               $image = 'data:image/'.$imageFileType.';base64,'.$image_base64; // On enregistre la donnée à mettre dans img src 
               $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet,file_name,datafile) VALUES (?,?,?,?,?,?)');
               $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$objet,$img_msg,$image));      
            }
            

            else{
               $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet) VALUES (?,?,?,?)');
               $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$objet)); 
            }
         
            $error = "Votre message a bien été envoyé à !";
         } else {
            $error = "Cet utilisateur n'existe pas...";
         }
      } else {
         $error = "Veuillez compléter tous les champs";
      }
   }
   $destinataires = $bdd->query('SELECT pseudo FROM membres ORDER BY pseudo');
   if(isset($_GET['r']) AND !empty($_GET['r'])) {
      $r = htmlspecialchars($_GET['r']);
   }
   if(isset($_GET['o']) AND !empty($_GET['o'])) {
      $o = urldecode($_GET['o']);
      $o = htmlspecialchars($_GET['o']);
      
      if(substr($o,0,3) != 'RE:') {
         $o = "RE:".$o;
      }
   }
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>Envoi de message</title>
      <meta charset="utf-8" />
   </head>
   <body>
   <form method="POST" enctype="multipart/form-data">
         <!--<select name="destinataire">
            <?php while($d = $destinataires->fetch()) { ?>
            <option><?= $d['pseudo'] ?></option>
            <?php } ?>!-->
         </select> 
         <label>Destinataire:</label>
         <input type="text" name="destinataire" <?php if(isset($r)) { echo 'value="'.$r.'"'; } ?> />
         <br /><br />
         <label>Objet:</label>
         <input type="text" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?> />
         <br /><br />


         <input type="file" name="img_msg"> <br><br> <!--  envoi image message -->


         <textarea placeholder="Votre message" name="message"></textarea><br>
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
      </form>
      <br />
      <a href="reception.php">Boîte de réception</a>
      <br />
   </body>
   </html>
	<?php
}
?>


<?php                           // AFFICHAGE DE LA PHOTO

if (empty(['img_msg']))
{
?>
<img src="membres\img_message/" alt="photo_profil" width="150">   <!-- dossier stock image message (img_message) -->
<?php

} 
?> 