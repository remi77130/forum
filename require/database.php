<?php // NE PAS ENVOYER EN PRODUCTION !!!!!
/*
 * On vient récupérer le fichier où se trouvent les configurations pour se connecter à la DB
 * 'require_once' fait le même rôle que include, mais est plus adapté pour ce cas-là 
 * (car on n'aura pas besoin de ré-include ce fichier, d'où le 'once')
 */

require_once __DIR__.'/config.php';

try {
    $bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_BASE.';charset=utf8mb4;', DB_USER, DB_PASS);
} catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
?>