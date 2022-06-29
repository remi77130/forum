<?php

require('database.php');


//Validation du formulaire
if(isset($_POST['validate'])){

    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $age = htmlspecialchars($_POST['age']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $religion = htmlspecialchars($_POST['religion']);
    
    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])
    AND !empty($_POST['password']) AND !empty($_POST['password2']) AND !empty($_POST['age']) 
    AND !empty($_POST['sexe']) AND !empty($_POST['religion']))
        
    {


        $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($password == $password2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($password == $password2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, mdp, age, sexe, religion) VALUES(?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp, $age, $sexe, $religion));
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