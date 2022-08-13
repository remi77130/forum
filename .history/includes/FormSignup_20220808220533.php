


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chanderland</title>
  <link rel="stylesheet" href="assets/FormSignup.css">

  
<style>
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>

<style>@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,700;1,400&family=Lato&display=swap');
</style>
</head>
<body>
  
</body>
</html>

<section class="section_signup">

  <div class="parent_form_signup">

  <div class="box">

    <form style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div>
    <label >Pseudo</label> <br>
    <input type="text" name="pseudo" maxlength="10" minlength="3" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div>
    
    <input type="number" name="age" / placeholder="Age">
  </div>  
  
  <div>
    <label >Sexe</label> <br>
    <select name="sexe">
    <option value="Homme">Homme</option>
    <option value="Femme">Femme</option>
    </select>
  </div>




  <div>
    <label >Mail</label> <br>
    <input type="email"  name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
  </div>


  <div>
    <label for="pasword">Mot de passe</label> <br>
    <input type="password"  minlength="5" name="password">
  </div>

  
  <div>
    <label for="password2">Comfirmation mot passe</label> <br>
    <input type="password"  minlength="5" name="password2">
  </div>

 <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>


<div class="lien_compte_user"> <a class="login_signup" href="connexion.php"><p>J'ai déjà un compte, <span class="span_login_signup"> je me connecte</span></p></a> <br>
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
