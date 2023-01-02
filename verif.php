<?php
session_start();
require 'require/database.php';
require_once "model/repository/user.repository.php";

//On va mettre à jour la date de dernière connexion si l'utilisateur est connecté
if (isset($_SESSION) && isset($_SESSION["id"])) {
    //On récupère l'utilisateur
    $user = UserRepository::findUser($_SESSION["id"]);
    if ($user) {
        //On met à jour sa date de dernière connexion
        UserRepository::updateLastConnection($user->getId());
    }
} elseif ($file = basename(__FILE__) != "index.php") {
    header('Location: index.php');
}
