

<!--   Page du profil -->

<?php 
	session_start();
   include_once('cookieconnect.php');
   include('includes/head.php');

 
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum', 'root', '');

  if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

?>





<html>
   <head>
      <title>Profil</title>
   </head>
   <body>






<section class="section_profil">



<div class="profil-container">

<div class="container_profil">


<a href="album.php">


         <?php                           // AFFICHAGE DE LA PHOTO

         if (!empty($userinfo['avatar']))
         {
         ?>
         <img src="membres\avatars/<?php echo $userinfo['avatar']; ?>" alt="photo_profil" >
         <?php

         }
         ?> 
         
<br>
         <br />
      
        <span class="pseudo_profil"><?php echo $userinfo['pseudo']; ?></span> <nl2br><nl2br><nl2br>
         
        <span class="age_profil"><?php echo $userinfo['age']; ?></span>  <br> <br>

       <span class="astrologie_profil"> <?php echo $userinfo['astrologie']; ?></span> <br> <br>
  
        <span class="descr_profil"> <?php echo $userinfo['description_profil']; ?></span> <br> 
        
 

</a>
        
</div> <!-- Fermeture div container_profil !-->
</div> <!-- Fermeture div profil !-->
</section>
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

   </body>
</html>
<?php   
}
?>