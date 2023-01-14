<?php
session_start();
require 'require/database.php';
require_once 'model/repository/user.repository.php';
require_once 'model/repository/department.repository.php';
require_once 'model/repository/city.repository.php';
require_once 'utils/mail.util.php';
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

    // SI LUTILISATEUR A CLIQUER SUR LE BOUTON D'ENREGISTREMENT
    if (!empty($_POST['validate'])) {
        $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
        $mail = isset($_POST['mail']) ? $_POST['mail'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
        $age = isset($_POST['age']) ? $_POST['age'] : null;
        $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : null;
        $department = isset($_POST['departement']) ? DepartmentRepository::findByCode($_POST['departement']) : null;
        $city = isset($_POST['ville_id']) ? CityRepository::findById($_POST['ville_id']) : null;

        // Si tous les champs sont bien complétés
        if ($pseudo && $mail && $password && $password2 && $age && $sexe && $department && $city) {
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
            if ($mailexist != 0) {
                $erreur = $erreur . "Votre mail est d&eacute;j&agrave; utilis&eacute; par un autre compte <br>";
                $registrationPass = false;
            }

            // Si les mots de passses ne correspondent pas 
            if ($password != $password2) {
                $erreur = $erreur . "Vos mot de passes ne correspondent pas ! <br>";
                $registrationPass = false;
            }

            //On vérifie si le département existe
            if(!$department){
                $erreur = "Veuillez choisir un département valide! <br>";
                $registrationPass = false;
            }

            //On vérifie si la ville existe
            if(!$city){
                $erreur = "Veuillez choisir une ville valide! <br>";
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
        if ($registrationPass == true) {
            try {

                // Comfirmation de compte avec chiffres aléatoire table = confirmkey & confirme *****
                // LONGEURE DE LA CLEF + ON INITIALISE LA VARIABLE
                $longueurkey = 15;
                $key = "";
                for ($i = 1; $i < $longueurkey; $i++) {
                    $key .= mt_rand(0, 9);
                }

                //On ajoute le user en base de données
                $userDto = new UserDto(null, $pseudo, $mail, $city, $department, "default.jpg", $age, $sexe, null, null, null, null, null);
                UserRepository::add($userDto, $password, $key);
            } catch (Exception $e) {
                echo 'Exception -> ';
                var_dump($e->getMessage());
                exit;
            }


            // Envoie d'un mail à l'inscription
            $confirmation_link = BASE_URL."confirmaccount.php?key=" . $key;
            $destinataire = "$mail"; // DEST DU MAIL
            $sujet = "Confirmation de compte";
            $message = "Bienvenue sur Chanderland $pseudo <br /><br />";
            $message = 'Veuillez cliquer sur ce lien pour confirmer votre compte : <a href="' . $confirmation_link.'">'.$confirmation_link.'</a>';
            MailUtil::send(MAIL_FROM, $destinataire, $sujet, $message);

            $erreur = $erreur . "Votre compte est créé. Vous allez recevoir un mail pour confirmer votre compte.<br>";
        }
    }
    ?>


    <!-- Form déja un compte -->

    <?php
    if (isset($_POST['formconnexion'])) {
        //$mailconnect = htmlspecialchars($_POST['mailconnect']);
        $mdpconnect = $_POST['mdpconnect'];
        $pseudoconnect = $_POST['pseudoconnect'];

        if (!empty($mailconnect) && !empty($mdpconnect)) {
            $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
            $requser->execute(array($mailconnect, $mdpconnect));
            $userexist = $requser->rowCount();
            if ($userexist == 1) {
                $userinfo = $requser->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['pseudo'] = $userinfo['pseudo'];
                $_SESSION['mail'] = $userinfo['mail'];

                header("Location: profil_membre.php"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
            }
        }
        if (!empty($pseudoconnect) && !empty($mdpconnect)) {
            $user = UserRepository::findByLoginPassword($pseudoconnect, $mdpconnect);
            if (!$user) {
              $erreur = "Mauvais mail ou mot de passe !";
            } elseif (!$user->isConfirmedAccount()) {
              $erreur = "Votre compte existe mais n'est pas validé, veuillez cliquer sur le lien dans le mail qui vous a été envoyé.";
            } else {
              $_SESSION['id'] = $user->getId();
              $_SESSION['pseudo'] = $user->getLogin();
              $_SESSION['mail'] = $user->getMail();
              UserRepository::updateLastConnection($_SESSION['id']);
              UserRepository::updateLastActivity($_SESSION['id']);
              header("Location: profil_membre.php"); // USERS REDIRIGE SUR LA PAGE INDEX VIA CONNEXION.PHP
            }
        } else {
            $erreur = "Tous les champs doivent être complétés !";
        }
    }
    ?>






</body>

</html>