<?php

// Nous allons inclure ce fichier à tous les fichiers (il va gérer composer, etc...)
include __DIR__.'/../vendor/autoload.php';

/* On inclut les fonctions dont on a besoin */

// Fonction permettant d'envoyer un message avec le $_POST et le $_FILE
include __DIR__.'/fonctions/function_envoi_message.php';
?>