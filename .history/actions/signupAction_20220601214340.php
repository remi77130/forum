<?php

require('actions/database.php');

if (isset($_POST['validate'])){

    if(!empty($_POST['email']) & !empty($_POST['pseudo']) & !empty($_POSTE['password'])){

        $user_email = htmlspecialchars($_POST['email']);
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($user_email));

        if($checkIfUserAlreadyExists->rowCount() > 0 ){

            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(email , pseudo, mdp)VALUES(?,?,?)');
            $insertUserOnWebsite->execute(array($user_email, $user_pseudo, $user_password));


        }else{

            $errorMsg = "l'utilisateur existe déja !";
        }


    }else {

        $errorMsg = "Veuillez completez tous les champs !";

    }

}