<?php
require 'require/database.php';
include 'includes/head.php';
?>
<!DOCTYPE html>
<html>

  <body>
    <h2>Forgot password</h2>
    <form method="post">
      <div class="container">

        <label for="email"><b>Email</b></label>

        <input type="email" placeholder="Enter Email" name="mail" required>

        <button type="submit">Send me a random password</button>
      </div>
    </form>
  </body>
</html>


<?php 

if(isset($_POST['mail']))
{
    $password = uniqid(); // GENER ID UNIQ

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);       // HASH MDP UPDATE BDD 

    $message = "Bonjour voici votre nouveau mot de passe : $password";
    $header = 'Content-Type: text/plain; charset "UTF-8"'." ";

    if(mail($_POST['mail'], 'Mot de passe oublié', $message, $header))
    {
        $sql = "UPDATE membres SET mdp = ? WHERE email = ?";
        $stmt = $bdd->prepare($sql); 
        $stmt->execute([$hashedpassword, $_POST['email']]);

        echo " Mail envoyé !";
    }

    else
    {
        echo "Une erreur est survenu...";
    }

    
}



?>