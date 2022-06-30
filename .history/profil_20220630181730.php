<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
 include 'includes/head.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   // id to integer
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userexist = $requser->rowCount();
   echo $userexist;
   $userinfo = $requser->fetch();
?>

<?php


if(isset($_POST['envoi_message'])) {
   if(isset($_POST['message'],$_POST['objet']) 
   AND !empty($_POST['message']) AND !empty($_POST['objet']) )
   
   {
      
      $message = htmlspecialchars($_POST['message']);
      $objet = htmlspecialchars($_POST['objet']);
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














<html>
   
   <body>
      <div > <!-- Profil visible-->
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         <?php echo $userinfo['pseudo']; ?><br><br>
         <br />

         
         <br />
        <?php echo $userinfo['mail']; ?> <br><br>
         <br />

         <?php if(!empty($userinfo['avatar'])) // PHOTO DE PROFIL
         {
            ?>
            <img class="photo_profil_profil" src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" width="150px" />
            <?php

         }
         ?>

         <br /><br />
 
         <label>Objet:</label>
         <input type="text" name="objet" />
         <br /><br />

       

         <textarea placeholder="Votre message" name="message"></textarea><br>
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />





        <?php echo $userinfo['description_profil']; ?>

      
         <?php  // FICHE PROFIL USERS CONNECT
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editProfil.php">Editer mon profil</a>
         <a href="reception.php">Mes messages</a>
         <a href="deconnexion.php">Se déconnecter</a>


         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
} 
?>