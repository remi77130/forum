<?php 
session_start(); //pour recup dans la bdd
require 'require/database.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site web</title>
  </head>
  <body>
    <h2>Forgot password</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter mail" name="mail" required>
        <button type="submit">Send me a Token</button>
      </div>
    </form>
  </body>
</html>


<?php
if(isset($_POST['mail'])){

  $token = uniqid();
  $url = "http://localhost/Forum/token?token=$token";

  $message = "Bonjour voici votre nouveau lien pour la réinitialisation du mot de passe : $url";
  $headers = 'Content-Type: text/plain; charset="UTF-8"'." ";

  // LE NEW MDP VA ETRE UPDATE DANS LA BDD LA OU L'ADRESSE EMAIL EST = 
  // A L'ADRESSE EMAIL ENTRER PAR USER

  if(mail($_POST['mail'], 'Mot de passe oublié', $message, $headers))
  {
    $sql = "UPDATE membres SET token = ? WHERE mail = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$token, $_POST['mail']]);
    

    echo "Mail envoyé !";
  }

  else "Une erreru est survenu";
  
}


?>