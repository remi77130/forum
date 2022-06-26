<?php 


include('profil.php');
   include_once('cookieconnect.php');
   include('includes/head.php');

 
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root', '');

  if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
  }




   if (empty($userinfo['img/membres']))
   {
   ?>
   <img src="membres\img_membres/<?php echo $userinfo['image_membre']; ?>" alt="img/users" width="150">
   
  <?php echo "$userinfo['pseudo']"; ?>
   <?php
   
   }
   






?>