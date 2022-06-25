<?php

require('actions/database.php');

if (isset($_POST['validate'])){

    if(!empty($_POST['email']) & !empty($_POST['pseudo']) & !empty($_POSTE['password'])){

        $user_email = htmlspecialchars($_POST['email']);
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        


    }else {

        $errorMsg = "Veuillez completez tous les champs !";

    }

}