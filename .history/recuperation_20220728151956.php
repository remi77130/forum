<?php


$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
if(isset($_POST['recup_submit'],$_POST['recup_mail'])){
    if(!empty($_POST['recup_mail'])){

        $mail = htmlspecialchars($_POST['recup_mail']);
    if(filter_var($mail,FILTER_VALIDATE_EMAIL)){  // VERIF ADRESSE MAIL VALID

        // RECUPERE LES DONEES EMAIL 
        $mail_exist = $bdd->prepare('SELECT id FROM membres WHERE email=?');
        $mail_exist->execute(array($recup_mail));

        $mail_exist = $mail_exist->rowCount();
        if($mail_exist == 1) { // SI UNE ADRESSE MAIL EXISTE 

            echo "ok mail existe";

        }
        else
        {
            
            $error ="Cette adresse mail n\'existe pas dans nos serveur.";
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

