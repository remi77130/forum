<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    echo "ok ";
        
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $password = sha1($_POST['password']);
        $password2 = sha1($_POST['password2']);

        $pseudolength = strlen($pseudo);
        if($pseudolength <= 255)
        
        {

        }
        
        else{
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères ! ";
        }

    }

        else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

