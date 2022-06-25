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

   <body>














   <body class="body">
  <div class="telephone-form-wrap">
    <h1 class="heading">Show and hide password field</h1>
    <p class="paragraph">Use this form to send us info about your project and get us in touch</p>
    <div class="w-form">
      <form id="email-form" name="email-form" data-name="Email Form" method="get">
        <div class="input-block"><input type="text" class="input w-input" maxlength="256" name="Name" data-name="Name" placeholder="Name" id="Name" required=""></div>
        <div class="input-block"><input type="password" class="input w-input" maxlength="256" name="Password" data-name="Password" placeholder="Password" id="Password" required="">
          <div class="eye"><img src="images/eye.jpg" alt="" class="eye_img"><img src="images/eye_close.png" alt=""></div>
        </div><input type="submit" value="Send info" data-wait="Please wait..." class="submit-button w-button">
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form.</div>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=62a73a8defa984bd784bdc84" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  <script>
	$(".eye").click(function(){
  $("#Password").attr("type", "text");
});
</script>
</body>



















      <div>
         <h2>Connexion</h2>
         <br /><br />
         <form  method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>