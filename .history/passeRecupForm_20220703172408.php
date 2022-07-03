<!DOCTYPE html>
<html lang="en">
<?php 

require 'require/database.php';
include 'includes/head.php';
?>
<body>
    
<h2>Login Form</h2><br><br>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" name="email" required><br><br>
        <label for="password"><b>Mot de passe</b></label> <br><br>
        <input type="password" name="password" required>
        <button type="submit">Connexion</button>
      </div>
      <div class="container" style="background-color:#f1f1f1"><br><br>
        <button type="button" class="cancelbtn">Annuler</button><br><br>
        <span class="psw"><a href="forgot_password.php">Mot de passe oublié ?</a></span>
      </div>
    </form>



</body>
</html>

<?php

if(isset($_POST['email'], $_POST['password']))
{
    $stmt = $bdd->prepare('SELECT mdp FROM membres WHERE mail = ?'); // RECUP PASSWORD TABLE MEMBRES OU EMAIL 
    $stmt->execute([$_POST['email']]);
    $hashedpassword = $stmt->fetchColumn();

if(password_verify($_POST['password'], $hashedpassword))

{
    echo "Connexion réussi";
}
else{

    echo "mdp incorect";
}

}


?>