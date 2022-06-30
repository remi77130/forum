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

    <input type="text">



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