<?php
function ajouter_vue (){
$fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR .'compteur';
if (file_exists($fichier)){
    // SI LE FICHIER EXSITE ON INCREMENT 
$compteur = file_get_contents($fichier);

}else{

    // SNON ON CREE LE FICHIER AVEC LA VALEUR 1
file_put_contents($fichier, '1');
}
// VERIF SI LE FICHIER COMPTEUR EXISTE 
}