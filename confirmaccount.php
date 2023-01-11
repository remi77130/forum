<?php
//récupérer la clé dans le GET
$key = isset($_GET["key"])?$_GET["key"]:null;
if(!$key){
    die("aucune clé fournie");
}

//Vérifier en base de données s'il existe un compte non validé avec cette clé
//...

//S'il existe, activer le compte et le rediriger vers son compte

//S'il n'existe pas, afficher une erreur avec un die comme j'ai fait au dessus)