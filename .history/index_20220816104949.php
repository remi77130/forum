<?php require 'signupAction.php'; ?>
<?php include 'includes/head.php'; ?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="assets/index.css">
<link rel="stylesheet" href="assets/FormSignup.css">


<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<body>



<div class="title_section_signup">
  <h2>Faite de nouvel <span> connaissance</span> <br> </h2>
</div>

<div style="text-align: center; padding-top:20px;">
  <img src="membres/betaversion.svg" alt="logo_beta_verson" style="width: 250px;">
  <br>
  <p>Site en cours de développement</p>
</div>

<section class="section_signup">

  <div class="parent_form_signup">

  <div class="box">

    <form style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div>
    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div>
    <input type="number" name="age" / placeholder="Age">
  </div>  
  
  <div>
    <select name="sexe">
    <option value="Homme">Homme</option>
    <option value="Femme">Femme</option>
    </select>
  </div>




  <div>
    <input type="email"  name="mail" placeholder="Mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>


  <div>
    <input type="password"  minlength="5" name="password" placeholder="Mot de passe">
  </div>

  
  <div>
    <input type="password"  minlength="5" name="password2" placeholder="Confirmation passe">
  </div>

 <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>


<div class="lien_compte_user"> 
  <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span class="span_login_signup"> je me connecte</span></p></a> <br>
</div>
      
   </form>

</div>
  
</div> <!--form_signup -->


<?php
if(isset($erreur))  //ERREUR MESSAGE CHAMPS NON COMPLET
{
  echo '<font color="red">'.$erreur."</font>";
  
} 
?>

</section>




</body>
</html>