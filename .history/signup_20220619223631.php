<?php require('signupAction.php'); ?>
<?php include 'includes/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>
    <br><br>

    <form class="container" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <label >Pseudo</label>
    <input type="text" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div class="mb-3">
    <label >Age</label>
    <input type="number" name="age" />
  </div>

  <div class="mb-3">
    <label c>Religion</label>
    <input type="radio"  />
  </div>


  
  <div class="mb-3">
    <label >Mail</label>
    <input type="email"  name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>


  <div class="mb-3">
    <label for="pasword">Mot de passe</label>
    <input type="password"  minlength="5" name="password">
  </div>

  
  <div class="mb-3">
    <label for="password2">Comfirmation mot passe</label>
    <input type="password"  minlength="5" name="password2">
  </div>

 
  <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>

  <br><br>
 <a href="connexion.php"><p>J'ai déjà un compte, je me connecte</p></a>

      
   </form>


<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>




</body>
</html>