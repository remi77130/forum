<?php
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
         $img_msg = htmlspecialchars($_POST['img_msg']);
         $id_destinataire = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ?');
         $id_destinataire->execute(array($destinataire));
         $dest_exist = $id_destinataire->rowCount();
         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet,img_msg) VALUES (?,?,?,?,?)');
            $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$objet,$img_msg));

            $error = "Votre message a bien été envoyé !";
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
   <form method="POST">
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




        <?php if(isset($_FILES['img_msg']) AND !empty($_FILES['img_msg']['name'])) {
      $tailleMaxi = 2097152; //2M0
      $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
      if($_FILES['img_msg']['size'] <= $tailleMaxi) {
         $extensionUpload = strtolower(substr(strrchr($_FILES['img_msg']['name'], '.'), 1));
         if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "membres\img_message/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['img_msg']['tmp_name'], $chemin);
            if($resultat) {
               $updateavatar = $bdd->prepare('UPDATE membres SET img_msg = :img_msg WHERE id = :id');
               $updateavatar->execute(array(
                  'img_msg' => $_SESSION['id'].".".$extensionUpload,
                  'id' => $_SESSION['id']
                  ));
            } else {
               $msg = "Erreur durant l'importation de votre photo de profil";
            }
         } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
         }
      } else {
         $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
      }


   }
  

?>




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
<img src="membres\img_membres/" alt="photo_profil" width="150">
<?php

} 
?> 