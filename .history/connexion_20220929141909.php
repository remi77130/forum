<?php
session_start();
 
require 'require/database.php';

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/connexion.css">

   <style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

   <title>Connexion</title>
</head>
<body>





 <?php
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil_membre.php"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
         
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
      <section>
         <div class="parent_conect_user">
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />

            <input class="connect_input" type="submit" name="formconnexion" value="Se connecter !" /> <br><br>



            </form>
      </div>

<div class="connect_compte">

            <a class="passe" href="recuperation.php">Mot de passe oublié !</a> <br>

             <a class="signup" href="index.php">Je n'ai pas de compte, je m'inscris</a>
</div>




</section>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>














<?php

if(isset($_POST['mailconnect'], $_POST['mdpconnect']))
{
    $stmt = $bdd->prepare('SELECT mdp FROM membres WHERE mail = ?'); // RECUP PASSWORD TABLE MEMBRES OU EMAIL 
    $stmt->execute([$_POST['mailconnect']]);
    $password = $stmt->fetchColumn();


}


?>




   
</body>
</html>