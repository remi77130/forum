<?php
/*************************************
 * Auteur : Rémi
 * Description : Méthode qui permet d'insérer un nouveau membre dans la table "membres"
 ************************************/

session_start();
require 'require/database.php';

$registrationPass = true;
$erreur = "";

/**********************
 * ETAPE 1 : VERIFICATION DES CHAMPS
 */
if (!empty($_POST['pseudo']) and !empty($_POST['mail'])
    and !empty($_POST['password']) and !empty($_POST['password2']) and !empty($_POST['age'])
    and !empty($_POST['sexe'])){


    if ($pseudolength > 255) {
        $registrationPass = false;
        $erreur = "Votre pseudo ne doit pas dépasssser 255 caractrere ";
    }

    if ($password != $password2) {
        $erreur = "Votre password ne correspond pas ! ";
        $registrationPass = false;
    }

    $requser = $bdd->prepare("SELECT * 
                              FROM membres 
                              WHERE pseudo = ?");
    $requser->execute(array($pseudo));
    $userexist = $requser->rowCount();

    if ($userexist == 1) {
        $erreur = "Pseudo d&eacute;j&agrave; utilis&eacute;";
    }

    $reqmail = $bdd->prepare("SELECT * 
                              FROM membres 
                              WHERE mail = ? ");  // REQUETE SI MAIL EXISTE DEJA
                $reqmail->execute(array($mail,));
                $mailexist = $reqmail->rowCount();

    if ($mailexist != 0){
        $registrationPass = false;
    }


} else {
    $erreur = "Veuillez completé tous les champs ! ";
    $registrationPass = false;
}

/**********************
 * ETAPE 2 : INSERER DANS LA BDD
 */

 if($registrationPass == true){
    try {
        $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, mdp, age, sexe, avatar, departement_nom, ville_id)
                                    VALUES(?,?,?,?,?,?,?,?)");
        $insertmbr->execute(array(
            $pseudo,
            $mail,
            $password,
            $age,
            $sexe,
            "default.jpg",
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
    $message = "Bienvenue sur le site $pseudo  ";

    $headers = "From:hguv5320@hguv5320.odns.fr";
    mail($destinataire, $sujet, $message, $headers);


    echo "Mail envoyé à $destinataire avec succes ! ";

    header("Location: connexion.php");
 }
