<?php

/*
 * Ce fichier va stocker les variables (notamment pour se connecter à la DB)
 * Il ne faut surtout pas commit les changements de ce fichier, uniquement la base doit être commitée
 *  mais pas les changements (d'où la raison pour laquelle le fichier est dans le gitignore).
 * Il faut donc le copier via le FTP.
 */

// ICI, "const" correspond à une constante, c'est une variable unique 
//qui ne pourra pas être modifiée plus tard dans le code

const DB_HOST = "localhost"; // L'hôte de la DB
const DB_USER = "root"; // L'utilisateur de la DB
const DB_PASS = ""; // Le mot de passe de la DB
const DB_BASE = "forum"; // La nom de la base de données
?>