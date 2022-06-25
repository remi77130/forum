<?php
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérifier si l'user a bien complété tous les champs
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mail'])  AND !empty($_POST['mail2']) 
    AND !empty($_POST['password']) AND !empty($_POST['password2']))
        
    {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $password = sha1($_POST['password']);
        $password2 = sha1($_POST['password2']);

    }

        else{
            $errorMsg = "L'utilisateur existe déjà sur le site";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

