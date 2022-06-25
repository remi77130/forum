<?php
session_start(); //pour recup dans la bdd
require('database.php');

if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
   if(isset($_POST['envoi_message'])) {
      if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) 
      AND !empty($_POST['message'])) 
      {
         $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);
         $img_message_img = ($img_message);
         $id_destinataire = $bdd->prepare('SELECT id FROM membres WHERE pseudo = ?');
         $id_destinataire->execute(array($destinataire));
         $dest_exist = $id_destinataire->rowCount();
         
         if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,img_message) VALUES (?,?,?,?)');
            $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$img_message));
            $error = "Votre message a bien été envoyé !";
         } else {
            $error = "Cet utilisateur n'existe pas...";
         }
      } 
      
      else
      {
         $error = "Veuillez compléter tous les champs";
      }
   }
   $destinataires = $bdd->query('SELECT pseudo FROM membres ORDER BY pseudo');
   ?>
   <!DOCTYPE html>
   <html>
   <head>
      <title>Envoi de message</title>
      <meta charset="utf-8" />
   </head>
   <body>
      <form method="POST">
         <label>Destinataire:</label>
        <select name="destinataire">
            <?php while($d = $destinataires->fetch()) { ?>
            <option><?= $d['pseudo'] ?></option>
            <?php } ?>
         </select>
         <br /><br />
         <textarea placeholder="Votre message" name="message"></textarea><br>


         <input type="file" name="img_message">
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />
         <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
      </form>

      <br />
      <a href="reception.php">Boîte de réception</a>
   </body>
   </html>
<?php
}else{

   ("Location: connexion.php");
}
?>