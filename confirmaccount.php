<?php
header ("Refresh: 5;URL=index.php");
require './require/database.php';
require_once("./model/repository/user.repository.php");
//récupérer la clé dans le GET
$key = isset($_GET["key"])?$_GET["key"]:null;
if(!$key){
    die("aucune clé fournie");
}

//Vérifier en base de données s'il existe un compte non validé avec cette clé
$user = UserRepository::findByKey($key);
if($user){
    //Si l'utilisateur n'est pas confirmé
    if(!$user->isConfirmedAccount()){
        //On confirme son compte
        UserRepository::confirmAccount($user);
        echo "<h4>Votre compte est confirmé, vous allez être redirigé dans quelques secondes...</h4>";
    }
}