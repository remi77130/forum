<?php
session_start();
require 'require/database.php';
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);

   try {
      $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
      $requser->execute(array($getid));
      $userinfo = $requser->fetch();
  }
  catch(Exception $e) {
      echo 'Exception -> ';
      var_dump($e->getMessage());
  }
   

}else{
   echo 'here';
}


?>
<html>
   <head>
      <title>Profil</title>
      <meta charset="utf-8">
   </head>
   <body>

      <div > <!-- Profil visible public-->

         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         <?php echo $userinfo['pseudo']; ?><br><br>
         <br />
         <br />
        <?php echo $userinfo['mail']; ?> <br><br>
         <br />

        <?php echo $userinfo['description_profil']; ?>
         

      </div>
      <div>
         <?php  // FICHE PROFIL USERS CONNECT

         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
         {

            ?>
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

?>