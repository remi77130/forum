<?php



session_start();
require 'require/database.php';


//Validation du formulaire
if(isset($_POST['validate'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = sha1($_POST['password']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['password'])){

       $pseudolength = strlen($pseudo);

       if($pseudolength <= 255) {
          if($password == $password) {
             if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                $reqmail->execute(array($mail));
                $mailexist = $reqmail->rowCount();
                if($mailexist == 0) {
                   if($mdp == $mdp2) {
                      $longueurKey = 15;
                      $key = "";
                      for($i=1;$i<$longueurKey;$i++) {
                         $key .= mt_rand(0,9);
                      }
                      $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, mdp, age, sexe, avatar, confirmkey, uniqid) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
  
                      $insertmbr->execute(array($pseudo, $mail, $mdp, $age, $sexe, "default.jpg", $key, uniqid()));
  
                      $header="MIME-Version: 1.0\r\n";
                      $header.='From:"hguv5320@hguv5320.odns.fr'."\n";
                      $header.='Content-Type:text/html; charset="uft-8"'."\n";
                      $header.='Content-Transfer-Encoding: 8bit';
                      $message='salut';
                      mail($mail, "Confirmation de compte", $message, $header);
                      $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                   } else {
                      $erreur = "Vos mots de passes ne correspondent pas !";
                   }
                } else {
                   $erreur = "Adresse mail déjà utilisée !";
                }
             } else {
                $erreur = "Votre adresse mail n'est pas valide !";
             }
          } else {
             $erreur = "Vos adresses mail ne correspondent pas !";
          }
       } else {
          $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
 }
 ?>