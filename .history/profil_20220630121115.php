<?php
session_start();
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
      <meta charset="utf-8">
   </head>
   <body>

      <div > <!-- Profil visible-->



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
}
?>