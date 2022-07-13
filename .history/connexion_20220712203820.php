<?php
session_start();
 
require 'require/database.php';
 
if (!empty($_POST['mail']) && !empty($_POST['password'])) {
   $mail = $_POST['mail'];
   $password = $_POST['password'];

   var_dump($mail);
   var_dump($password);

   $q = $db->prepare('SELECT * FROM membres WHERE mail = :mail');
   $q->bindValue('mail', $mail);
   $q->execute();
   $res = $q->fetch(PDO::FETCH_ASSOC);
   
   var_dump($res);
   
   if ($res) {
       $passwordHash = $res['password'];
       if (password_verify($password, $passwordHash)) {
           echo "Connexion réussie !";
       } else {
           echo "Identifiants invalides";
       }
   } else {
       echo "Identifiants invalides";
   }
}
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mail" placeholder="Mail" />
            <input type="password" name="password" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" /> <br><br>
            <a href="forgot_password.php">Mot de passe oublié !</a>

         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>


<?php

if(isset($_POST['mail'], $_POST['password']))
{
    $stmt = $bdd->prepare('SELECT mdp FROM membres WHERE mail = ?'); // RECUP PASSWORD TABLE MEMBRES OU EMAIL 
    $stmt->execute([$_POST['mail']]);
    $password = $stmt->fetchColumn();

    


}


?>