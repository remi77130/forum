<?php


$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start(); 


if(isset($_POST['recup_submit'],$_POST['recup_mail'])){
    if(!empty($_POST['recup_mail'])){

        $recup_mail = htmlspecialchars($_POST['recup_mail']);
    if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)){  // VERIF ADRESSE MAIL VALID

        echo = "ok mon kiki"
        // RECUPERE LES DONEES EMAIL DANS LA BDD
        $mail_exist = $bdd->prepare('SELECT id FROM membres WHERE mail=?');
        $mail_exist->execute(array($recup_mail));

        $mail_exist = $mail_exist->rowCount();
        if($mail_exist == 1) { // SI UNE ADRESSE MAIL EXISTE 

            $_SESSION['recup_mail'] = $recup_mail;


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

