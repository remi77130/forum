<!DOCTYPE html>
<html lang="en">
<?php 

require 'require/database.php';
?>
<body>
    
<h2>Login Form</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" name="email" required>
        <label for="password"><b>Mot de passe</b></label>
        <input type="password" name="password" required>
        <button type="submit">Connexion</button>
      </div>
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Annuler</button>
        <span class="psw"><a href="forgot_password.php">Mot de passe oublié ?</a></span>
      </div>
    </form>



</body>
</html>