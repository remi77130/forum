<?php
function ajouter_vue (){
$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR .'compteur';
$fichier_journalier = $fichier . '-' date('Y-m-d');
$compteur = 1;
if (file_exists($fichier)){
    // SI LE FICHIER EXSITE ON INCREMENT 
$compteur = (int)file_get_contents($fichier);
$compteur++;

}

file_put_contents($fichier, $compteur);

}
function incrementer_compteur(string $fichier)

function nombre_vues (): string {

    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);

}