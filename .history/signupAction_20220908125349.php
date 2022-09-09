<?php
session_start();
require 'require/database.php';

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
        
        // AVEC VILLE ET DPT
        $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, mdp, age, sexe, avatar, departement_nom, ville_id)
                                    VALUES(?,?,?,?,?,?,?,?)");
        //Sans ville et dpt
        /*$insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, mdp, age, sexe, avatar)
        VALUES(?,?,?,?,?,?)");*/
                                    
        $insertmbr->execute(array(
            $pseudo,
            $mail,
            $password,
            $age,
            $sexe,
            "default.jpg",
            // a mettre en commentaire si ville et dpt non utilisé
            htmlspecialchars($_POST['departement']),
            htmlspecialchars($_POST['ville_id'])
        ));

    } catch (Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
        exit;

    }

    
    $destinataire = "$mail"; // DEST DU MAIL
    $sujet = "Confirmation de compte";
    $message = "Bienvenue sur le Chanderland $pseudo  ";

    $headers = "From:hguv5320@hguv5320.odns.fr";
    mail($destinataire, $sujet, $message, $headers);


    echo "Mail envoyé à $destinataire avec succes ! ";



    //header("Location: connexion.php");











 }

}
?>