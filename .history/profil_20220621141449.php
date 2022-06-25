
<?php 
	session_start();
   include_once('cookieconnect.php');

 
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root', '');

  if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div>
         <h2><?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         
         <div>
         <?php                           // AFFICHAGE DE LA PHOTO

         if (!empty($userinfo['avatar']))
         {
         ?>
         <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" width="150">
         <?php

         }
         ?> 
         
</div><br>
       <?php echo $userinfo['pseudo']; ?>
         <br />
        <?php echo $userinfo['mail']; ?> <br>
        <?php echo $userinfo['sexe']; ?>

        <?php echo $userinfo['description_profil']; ?>




         
         <br />
         <?php
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