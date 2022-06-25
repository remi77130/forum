<?php require('actions/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <br><br>

    <form class="container" method="POST">



<h2>Connexion</h2>


  
  <div class="mb-3">
    <label for="mail" class="form-label">Mail</label>
    <input type="email" class="form-control" name="mailconnect" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>

  <div class="mb-3">
    <label for="pasword" class="form-label">Password</label>
    <input type="password" class="form-control" name="passwordconnect">
  </div>
 
  <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>

  <br><br>
 <a href="login.php"><p>J'ai déjà un compte, je me connecte</p></a>

      
   </form>


<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>




</body>
</html>