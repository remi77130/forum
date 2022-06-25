<?php require('signupAction.php'); ?>
<?php include 'includes/head.php'; ?>
<!DOCTYPE html>
<html lang="en">

<body>

<header>
<div class="dropdown-center">
  <button class="btn_menu" type="button" id="dropdownCenterBtn" data-bs-toggle="dropdown" aria-expanded="false">
    Menu
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownCenterBtn">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Action two</a></li>
    <li><a class="dropdown-item" href="#">Action three</a></li>
  </ul>
</div>
</header>

<section class="section_signup">
    
<div class="form_signup">

    <form style="text-align: center;" method="POST" enctype="multipart/form-data">

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