
<head>
 <link rel="stylesheet" href="assets/recuperation.css">
</head>
<?php
session_start();
require 'require/database.php';
require_once 'utils/mail.util.php';

if (isset($_GET['section'])) {

   $section = htmlspecialchars($_GET['section']);
} else {

   $section = "";
}

if (isset($_POST['recup_submit'], $_POST['recup_mail'])) {
   if (!empty($_POST['recup_mail'])) {

      $recup_mail = htmlspecialchars($_POST['recup_mail']);
      if (filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {  // VERIF ADRESSE MAIL VALID
         // RECUPERE LES DONEES EMAIL DANS LA BDD
         $mail_exist = $bdd->prepare('SELECT id,pseudo FROM membres WHERE mail=?');
         $mail_exist->execute(array($recup_mail));
         $mail_exist_count = $mail_exist->rowCount();

         if ($mail_exist_count == 1) {
            // SI UNE ADRESSE MAIL EXISTE 

            $pseudo = $mail_exist->fetch();
            $pseudo = $pseudo['pseudo'];

            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = 0; // BDD : RECUPERATION -> Code = Integer(11)

            // GENERATION CODE SECURITE 
            for ($i = 0; $i < 10; $i++) {
               $recup_code .= mt_rand(0, 9);
            }


            // VERIF SI MAIL DANS LA TABLE
            $mail_recup_exist = $bdd->prepare('SELECT * FROM recuperation WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();

            // SI MAIL EXISTE DANS LA TABLE ON MET LE CODE A JOUR
            if ($mail_recup_exist == 1) {

               $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
               $recup_insert->execute(array($recup_mail, $recup_code));
            } else // SI MAIL EXISTE PAS ON INSERT EMAIL 
            {
               $recup_insert = $bdd->prepare('INSERT INTO recuperation (mail,code) VALUES (?, ?)');
               $recup_insert->execute(array($recup_mail, $recup_code));
            }

            // EMAIL 
            $message = '
               <html>
                  <head>
                      <title>Récupération de mot de passe - Votresite</title>
                      <meta charset="utf-8" />
                  </head>
                  <body>
                      <font color="#303030";>
                         <div align="center">
                           <table width="600px">
                            <tr>
                               <td>
                                 
                                 <div align="center">Bonjour <b>' . $pseudo . '</b>,</div> <br />
                                       Voici votre code de récupération: <b>' . $recup_code . '</b> <br> 
                                 A bientôt sur <a href="https://chanderland.com/">Chanderland</a> !
                                 
                               </td>
                            </tr>
                            <tr>
                               <td align="center">
                                 <font size="2">
                                  Ceci est un email automatique, merci de ne pas y répondre
                                 </font>
                               </td>
                            </tr>
                           </table>
                         </div>
                      </font>
                  </body>
               </html>
               ';
            
            MailUtil::send(MAIL_FROM, $recup_mail, "Récupération de mot de passe - Chanderland.com", $message);
            header("Location: recuperation.php?section=code");
         } else // Si adresse mail non trouvé dans la bdd
         {

            $error = "Cette adresse mail n'existe pas dans nos serveur.";
         }
      } else // Si erreur dans l'adresse mail entré par l'utilisateur
      {
         $error = "adresse mail invalide";
      }
   } else // Si l'utilisateur n'a pas encore rentré son adresse mail
   {
      $error = "Veuillez entrer votre email";
   }
}

// VERIFICATION FORMULAIRE CODE MOT DE PASSE 
if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
   if (!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'], $verif_code));
      $verif_req = $verif_req->rowCount();

      if ($verif_req == 1) {
         $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         header('Location: recuperation.php?section=changemdp');
      } else {
         $error = "Code invalide";
      }
   } else {
      $error = "Veuillez entrer votre code de récupération";
   }
}


if (isset($_POST['change_submit'])) {
   if (isset($_POST['change_mdp'], $_POST['change_mdpc'])) {
      $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme?$verif_confirme['confirme']:0;

      if ($verif_confirme == 1) {
         $mdp = $_POST['change_mdp'];
         $mdpc = $_POST['change_mdpc'];

         if (!empty($mdp) and !empty($mdpc)) {
            if ($mdp == $mdpc) {
               $mdp = sha1($mdp);
               $ins_mdp = $bdd->prepare('UPDATE membres SET mdp = ? WHERE mail = ?');
               $ins_mdp->execute(array($mdp, $_SESSION['recup_mail']));

               $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
               $del_req->execute(array($_SESSION['recup_mail']));

               header('Location:index.php');
            } else {
               $error = "Vos mots de passes ne correspondent pas";
            }
         } else {
            $error = "Veuillez remplir tous les champs";
         }
      } else {
         header("Location: recuperation.php?section=code");
      }
   } else {
      $error = "Veuillez remplir tous les champs";
   }
}

require_once 'recuperation.view.php';
