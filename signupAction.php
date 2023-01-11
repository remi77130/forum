

<?php
session_start();
require 'require/database.php';
require_once 'model/repository/user.repository.php';
?>

<!DOCTYPE html>
<html lang="en">

<body>
<!-- Form inscription -->

<?php
$registrationPass = true;
$erreur = "";

/**********************
 * ETAPE 1 : VERIFICATION DES CHAMPS
 */

// SI LUTILISATEUR A CLIQUER SUR LE BOUTON DENREGISTREMENT
if (!empty($_POST['validate'])) { 
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $age = htmlspecialchars($_POST['age']);
    $sexe = htmlspecialchars($_POST['sexe']);
    //$departement = htmlspecialchars($_POST['departement']);
    //$ville = htmlspecialchars($_POST['ville_id']);

    // Si tous les champs sont bien complétés
if (!empty($_POST['pseudo'])
    and !empty($_POST['mail'])
    and !empty($_POST['password'])
    and !empty($_POST['password2'])
    and !empty($_POST['age'])
    and !empty($_POST['sexe'])
    //and !empty($POST['departement'])
    //and !empty($POST['ville_id'])
    ){
    // Si le pseudo dépasse 255 caractères
    $pseudolength = strlen($pseudo);
    if ($pseudolength > 255) { 
        $registrationPass = false;
        $erreur = $erreur .  "Votre pseudo ne doit pas dépasssser 255 caractrere <br>";
    }

    $requser = $bdd->prepare("SELECT * 
                              FROM membres 
                              WHERE pseudo = ?");
    $requser->execute(array($pseudo));
    $userexist = $requser->rowCount();

    // Si le pseudo existe déjà
    if ($userexist > 0) {
        $erreur = $erreur . "Pseudo d&eacute;j&agrave; utilis&eacute; <br>";
        $registrationPass = false;
    }

    $reqmail = $bdd->prepare("SELECT * 
                              FROM membres 
                              WHERE mail = ? ");  // REQUETE SI MAIL EXISTE DEJA
                $reqmail->execute(array($mail,));
                $mailexist = $reqmail->rowCount();

    // Si le mail est déjà utilisé par un autre compte
    if ($mailexist != 0){
        $erreur = $erreur . "Votre mail est d&eacute;j&agrave; utilis&eacute; par un autre compte <br>";
        $registrationPass = false;
    }

    // Si les mots de passses ne correspondent pas 
    if ($password != $password2) {
        $erreur = $erreur . "Vos mot de passes ne correspondent pas ! <br>";
        $registrationPass = false;
    }

// Si tous les champs ne sont pas complétés
} else {
    $erreur = "Veuillez compléter tous les champs! <br>";
    $registrationPass = false;
}


/**********************
 * ETAPE 2 : INSERER DANS LA BDD
 */

 // Si la vérification s'est bien passé à l'étape 1
 if($registrationPass == true){
    try {
        
        // Comfirmation de compte avec chiffres aléatoire table = confirmkey & confirme *****
        // LONGEURE DE LA CLEF + ON INITIALISE LA VARIABLE
        $longueurkey = 5;
        $key = "";
        for($i = 1; $i < $longueurkey; $i++){
            $key .= mt_rand(0,9);

        }
        // AVEC VILLE ET DPT
        $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, confirmkey, mdp, age, sexe, avatar, 
        departement_nom, ville_id)
                                    VALUES(?,?,?,?,?,?,?,?,?)");
                                    
        $insertmbr->execute(array(
            $pseudo,
            $mail,
            $key, // clef
            $password,
            $age,
            $sexe,
            "default.jpg",// JPG !IMPORTANT
            // a mettre en commentaire si ville et dpt non utilisé
            htmlspecialchars($_POST['departement']),
            htmlspecialchars($_POST['ville_id'])
        ));

    } catch (Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
        exit;

    }


    // Envoie d'un mail à l'inscription
    
    $destinataire = "$mail"; // DEST DU MAIL
    $sujet = "Confirmation de compte";
    $message = "Bienvenue sur Chanderland $pseudo ";

    $headers = "From:hguv5320@hguv5320.odns.fr";
    mail($destinataire, $sujet, $message, $headers);


    echo "Mail envoyé à $destinataire avec succes ! ";
    
    $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
    $requser->execute(array($pseudo));
    $userexist = $requser->rowCount();

    $userinfo = $requser->fetch();
    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['pseudo'] = $userinfo['pseudo'];
    $_SESSION['mail'] = $userinfo['mail'];
    header("Location: confirmation.php?pseudo='.urlencode($pseudo).'&key.$key.'"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
    
 }

}
?>


<!-- Form déja un compte -->

<?php
if(isset($_POST['formconnexion'])) {
   //$mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);

      if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
        
         header("Location: profil_membre.php"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
    }}
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND mdp = ?");
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         UserRepository::updateLastConnection($_SESSION['id']);
         UserRepository::updateLastActivity($_SESSION['id']);
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil_membre.php"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
         
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>





    
</body>
</html>