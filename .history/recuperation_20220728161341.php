<?php


$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start(); 


if(isset($_POST['recup_submit'],$_POST['recup_mail'])){
    if(!empty($_POST['recup_mail'])){

        $recup_mail = htmlspecialchars($_POST['recup_mail']);
    if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)){  // VERIF ADRESSE MAIL VALID

        echo  "ok mon kiki";
        // RECUPERE LES DONEES EMAIL DANS LA BDD
        $mail_exist = $bdd->prepare('SELECT id,pseudo FROM membres WHERE mail=?');
        $mail_exist->execute(array($recup_mail));
        $mail_exist_count = $mail_exist->rowCount();

        if($mail_exist_count == 1) { // SI UNE ADRESSE MAIL EXISTE 
            
            $pseudo = $mail_exist->fetch();
            $pseudo = $pseudo['pseudo'];

            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = "";

             // GENERATION CODE SECURITE 
            for($i=0; $i < 10; $i++){
                $recup_code .= mt_rand(0,11);
            }
            
            $_SESSION['recup_code'] = $recup_code;

            // VERIF SI MAIL DANS LA TABLE
            $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();
            
            // SI MAIL EXISTE DANS LA TABLE ON MET LE CODE A JOUR
            if($mail_recup_exist == 1){

                $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                $recup_insert->execute(array($recup_code,$recup_mail));
            }
            
            else // SI MAIL EXISTE PAS ON INSERT EMAIL 
            {
                $recup_insert = $bdd->prepare('INSERT INTO recuperation (mail,code) VALUES (?, ?)');
                $recup_insert->execute(array($recup_mail,$recup_code));
            }

            $recup_insert = $bdd->prepare('INSERT INTO recuperation (mail,code) VALUES (?, ?)');
            $recup_insert->execute(array($recup_mail,$recup_code));



        }
        else
        {
            
            $error ="Cette adresse mail n'existe pas dans nos serveur.";
        }


       }
       
       else
       {
        $error = "adresse mail invalide";
       }
    }
    else
    {
        $error = "Veuillez entrer votre email";
    }
}






require 'recuperation.view.php';

?>

