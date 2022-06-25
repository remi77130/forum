<?php require('signupAction.php'); ?>
<?php include 'includes/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>

<header>

<div>
    <img src="img/3.png" alt="logo" width="50px">
  </div>
  <div>
<button type="button" class="btn btn-primary"><a href="connexion.php">Connexion</a></button>
  </div>
 
</header>


<section class="section_signup">

<div>
    <form class="form_signup"  style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <label >Pseudo</label> <br>
    <input type="text" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div class="mb-3">
    <label >Age</label> <br>
    <input type="number" name="age" />
  </div>

  <div class="mb-3">
    <label >Mail</label> <br>
    <input type="email"  name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>


  <div class="mb-3">
    <label for="pasword">Mot de passe</label> <br>
    <input type="password"  minlength="5" name="password">
  </div>

  
  <div class="mb-3">
    <label for="password2">Comfirmation mot passe</label> <br>
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

</div>
</section>


<footer>
<P>Le footer</P>
</footer>

</body>
</html>