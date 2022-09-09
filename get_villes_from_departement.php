<?php
require 'require/database.php';

$villes = [];

// Ce fichier PHP va permettre de récupérer les villes via un département donné en paramètre
if(isset($_GET) && !empty($_GET['departement_code'])) {


    // On utilise la fonction `prepare` car on envoie une donnée à la requête SQL 
    //(on évite donc les données hack)
    
    $req_selectVilles = $bdd->prepare('SELECT ville_id, ville_nom_reel, ville_code_postal FROM villes_france WHERE ville_departement = :ville_departement ORDER BY ville_nom_reel ASC');
    $req_selectVilles->execute(
        [
            'ville_departement' => $_GET['departement_code'] // On envoie le département
        ]
    );

    // Par sécurité, on regarde s'il y a bien des villes pour les afficher
    if($req_selectVilles->rowCount() > 0) {
        $villes = $req_selectVilles->fetchAll();
    }
}

// On renvoie en JSON les données pour pouvoir mieux les gérer en jQuery/Ajax
die(json_encode($villes));
?>