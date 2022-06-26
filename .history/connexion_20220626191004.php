<?php

include 'includes/head.php';
include 'signupAction.php';


include_once('cookieconnect.php');

 
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {

      $reqUser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $reqUser->execute(array($mailconnect, $mdpconnect));
      $userExist = $reqUser->rowCount();
      if($userExist == 1) 
      {
         if(isset($_POST['rememberme'])) //checkbox remember
         {
            setcookie('email',$mailconnect,time()+365*24*3600,null,null,false,true);
            setcookie('password',$mdpconnect,time()+365*24*3600,null,null,false,true);
         }
         $userInfo = $reqUser->fetch();
         $_SESSION['id'] = $userInfo['id'];
         $_SESSION['pseudo'] = $userInfo['pseudo'];
         $_SESSION['mail'] = $userInfo['mail'];

         header("Location: profil.php?id=".$_SESSION['id']);
      }

      else 
      {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<html>









<body class="body_connect">

<header class="header_connect" style="border: 1px solid black;">
  
</header>


<section class="section_connect">



      <div class="container_connect">
      <h2>Connexion</h2>
         <br /><br />

         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" /> 

            <input type="password" name="mdpconnect" placeholder="Mot de passe" />

            <br /><br />

            <input type="submit" name="formconnexion" value="Se connecter !" /> <br>
            
            <input type="checkbox" name="rememberme" id="remembercheckbox" style="cursor:pointer"> <br>
            <label for="remembercheckbox" style="cursor:pointer">Se souvenir de moi </label>
         </form> <br>

         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>

</section>
   </body>
</html>