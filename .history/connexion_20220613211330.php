<?php

require('signupAction.php');
include 'includes/head.php';
 
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $reqUser = $bdd->prepare("SELECT * FROM users WHERE mail = ? AND mdp = ?");
      $reqUser->execute(array($mailconnect, $mdpconnect));
      $userExist = $reqUser->rowCount();
      if($userExist == 1) {
         $userInfo = $reqUser->fetch();
         $_SESSION['id'] = $userInfo['id'];
         $_SESSION['pseudo'] = $userInfo['pseudo'];
         $_SESSION['mail'] = $userInfo['mail'];

         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
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
  <div>
<img src="img/logo.png" alt="" width="200px">
  </div>
</header>


<section class="section_connect" style="border: 5px solid red;">

      <div class="container_connect">
              <h2>Connexion</h2>

         <br /><br />
        
         <form  method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" /> <br> 
            
            <input type="password" name="mdpconnect" placeholder="Mot de passe" /><br>
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
            
         </form>
         
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>

</section>
   </body>
</html>