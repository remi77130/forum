<?php



session_start();
require 'require/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>









<form style="text-align: center;" method="POST" enctype="multipart/form-data">

    <div>
    <input type="text" name="pseudo" maxlength="10" minlength="3" placeholder="Pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
  </div>

  <div>
    <input type="number" name="age" placeholder="Age">
  </div>  
  
  <div>
    <select name="sexe">
    <option value="Homme">Homme</option>
    <option value="Femme">Femme</option>
    </select>
  </div>

  
<div class="dpt"> <!-- Select departement -->

<label  for="inputdepart">Département</label>

<select id="inputdepart" name="inputdepart" require>

<option value="">Selectionnez un département</option>

<?php
// BOUCLE DPT
while($row = $pdostmt->fetch(PDO::FETCH_ASSOC)):
  ?>
  
<option value="<?php echo $row["departement_code"]?>"><?php echo $row["departement_nom"]?></option>
<?php endwhile;?>

</select>

</div>




<div> <!-- Selectionnez une ville-->

<label for="inuputville">Ville</label>
<select name="inuputville" id="inuputville" required>



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













</body>
</html>