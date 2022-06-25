<?php require('signupAction.php'); ?>
<?php include 'includes/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>
    <br><br>

    <form style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <label >Pseudo</label>
    <input type="text" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div class="mb-3">
    <label >Age</label>
    <input type="number" name="age" />
  </div>

  <div>
    <Label>Religion</Label> <br>

    <input type="radio" name="Juif" >
    <label for="Juif">Juif</label> <nl2br>

    <input type="radio" id="contactChoice2"
     name="contact" value="musulman">
    <label for="contactChoice2">Téléphone</label>

    <input type="radio" id="contactChoice3"
     name="contact" value="chrétien ">
    <label for="contactChoice3">Courrier</label>
  </div>
  <div>

  
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