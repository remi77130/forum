<?php
function ajouter_vue (){
$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR .'compteur';
$compteur = 1;
if (file_exists($fichier)){
    // SI LE FICHIER EXSITE ON INCREMENT 
$compteur = (int)file_get_contents($fichier);
$compteur++;

}

file_put_contents($fichier, '1');

}