<?php

require_once('recuperation.view.php');

if(isset($_POST['recup_submit'],$_POST['recup_mail'])){
    if(!empty($_POST['recup_mail'])){

        $mail = htmlspecialchars($_POST['recup_mail']);
       if(filter_var($mail,FILTER_VALIDATE_EMAIL)){  // VERIF ADRESSE MAIL VALID

        echo "ok pour mail valide";
       }else{
        $error = "adresse mail invalide"
       }
    }else{
        $error = "Veuillez entrer votre email";
    }
}
?>

