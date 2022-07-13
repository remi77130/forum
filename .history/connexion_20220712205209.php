<?php
session_start();
 
require 'require/database.php';
 
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: index.php"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
         
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>


<?php

if (!empty($_POST['email']) && !empty($_POST['password'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   var_dump($mail);
   var_dump($mdp);

   $q = $bdd->prepare('SELECT * FROM membres WHERE mail = :mail');
   $q->bindValue('email', $email);
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




         <form method="POST" action="login.php">
        <input type="email" placeholder="Email" name="email"><br>
        <input type="password" placeholder="Mot de passe" name="password"><br>
        <button type="submit">Connexion</button>
    </form>
    
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

if(isset($_POST['mailconnect'], $_POST['mdpconnect']))
{
    $stmt = $bdd->prepare('SELECT mdp FROM membres WHERE mail = ?'); // RECUP PASSWORD TABLE MEMBRES OU EMAIL 
    $stmt->execute([$_POST['mailconnect']]);
    $password = $stmt->fetchColumn();

    


}


?>