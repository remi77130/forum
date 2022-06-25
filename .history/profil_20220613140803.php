
<?php 
session_start(); //pour recup dans la bdd
require('database.php');


if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getId = intval($_GET['id']);
   $reqUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
   $requUser->execute(array($getId));
   $userInfo = $reqUser->fetch();
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div>
         <h2>Profil de <?php echo $userInfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userInfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userInfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editProfil.php">Editer mon profil</a>
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