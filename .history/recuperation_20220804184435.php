<?php


$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start(); 


if(isset($_GET['section'])){

    $section = htmlspecialchars($_GET['section']);
    
}else{

    $section = "";
}

if(isset($_POST['recup_submit'],$_POST['recup_mail'])){
    if(!empty($_POST['recup_mail'])){

        $recup_mail = htmlspecialchars($_POST['recup_mail']);
    if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)){  // VERIF ADRESSE MAIL VALID

        echo  "ok mon kiki";
        // RECUPERE LES DONEES EMAIL DANS LA BDD
        $mail_exist = $bdd->prepare('SELECT id,pseudo FROM membres WHERE mail=?');
        $mail_exist->execute(array($recup_mail));
        $mail_exist_count = $mail_exist->rowCount();

        if($mail_exist_count == 1) { 
        // SI UNE ADRESSE MAIL EXISTE 
            
            $pseudo = $mail_exist->fetch();
            $pseudo = $pseudo['pseudo'];
            var_dump($pseudo);

            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = 0; // BDD : RECUPERATION -> Code = Integer(11)

             // GENERATION CODE SECURITE 
            for($i=0; $i < 10; $i++){
                $recup_code .= mt_rand(0,9);
            }
            
            
            // VERIF SI MAIL DANS LA TABLE
            $mail_recup_exist = $bdd->prepare('SELECT * FROM recuperation WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();
            
            // SI MAIL EXISTE DANS LA TABLE ON MET LE CODE A JOUR
            if($mail_recup_exist == 1){

                $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                $recup_insert->execute(array($recup_mail,$recup_code));
    
            }else // SI MAIL EXISTE PAS ON INSERT EMAIL 
            {
                $recup_insert = $bdd->prepare('INSERT INTO recuperation (mail,code) VALUES (?, ?)');
                $recup_insert->execute(array($recup_mail,$recup_code));
            }

           // $recup_insert = $bdd->prepare('INSERT INTO recuperation (mail,code) VALUES (?, ?)');
           // $recup_insert->execute(array($recup_mail,$recup_code));

            // EMAIL 

         $header="MIME-Version: 1.0\r\n";
         $header.='From:"[VOUS]"<hguv5320@hguv5320.odns.fr>'."\n";
         $header.='Content-Type:text/html; charset="utf-8"'."\n";
         $header.='Content-Transfer-Encoding: 8bit';
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
                     
                     <div align="center">Bonjour <b>'.$pseudo.'</b>,</div> <br />
                            Voici votre code de récupération: <b>'.$recup_code.'</b> <br> 
                     A bientôt sur <a href="#">Votre site</a> !
                     
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
         mail($recup_mail, "Récupération de mot de passe - Votresite", $message, $header);
         header("Location: http://localhost/Forum/recuperation.php?section=code");

        }
        else // Si adresse mail non trouvé dans la bdd
        {
            
            $error ="Cette adresse mail n'existe pas dans nos serveur.";
        }


       }
       
       else // Si erreur dans l'adresse mail entré par l'utilisateur
       {
        $error = "adresse mail invalide";
       }
    }
    else // Si l'utilisateur n'a pas encore rentré son adresse mail
    {
        $error = "Veuillez entrer votre email";
    }
    }

    // VERIFICATION FORMULAIRE CODE MOT DE PASSE 
    if(isset($_POST['verif_submit'],$_POST['verif_code'])){
    if(!empty($_POST['verif_code'])){

    // RECUPERATION CODE DANS LA BDD DANS LA TABLE
    $verif_code = htmlspecialchars($_POST['verif_code']);
    $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ? ');
    $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
    $verif_req = $verif_req->rowCount();

    // SI UN CODE EXISTE BIEN DANS LA BDD 
    if($verif_req == 1){

    // SUPP CHAMP 
        $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ? ');
        $del_req->execute(array($_SESSION['recup_mail']));

        header('Location:http://localhost/Forum/recuperation.php?section=changemdp');
    }
    
    // SI AUCUN CODE NE CORRESPOND
    else 
    {
        $error = "Code invalide !";
    }

}

else
{
    $error = "Veuillez entrer votre code de confirmation";
}

}


if(isset($_POST['change_submit'])){
    if(isset($_POST['change_mdp'],$_POST['change_mdpc'])){
        $mdp = htmlspecialchars($_POST['change_mdp']);
        $mdpc = htmlspecialchars($_POST['change_mdpc']);
        if(!empty($mdp) AND !empty($mdpc)){

            if($mdp == $mdpc){

                $mdp = sha1($mdp);
                $ins_mdp = $bdd->prepare('UPDATE membres SET mdp WHERE mail = ? ');
                $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));

                header('Location:http://localhost/Forum/connexion.php');
            }else{

                $error = "Vos mot de passe ne correspondent pas";
            }

        }else{

            $error = "Veuillez remplir tous les champs";        }
    }else{
        $error = "Veuillez remplir tous les champs";
    }
}

require_once 'recuperation.view.php';

?>

