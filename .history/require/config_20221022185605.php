<?php

/*
 * Ce fichier va stocker les variables (notamment pour se connecter à la DB)
 * Il ne faut surtout pas commit les changements de ce fichier, uniquement la base doit être commitée
 *  mais pas les changements (d'où la raison pour laquelle le fichier est dans le gitignore).
 * Il faut donc le copier via le FTP.
 */

// ICI, "const" correspond à une constante, c'est une variable unique 
//qui ne pourra pas être modifiée plus tard dans le code

// Le fichier config.php est unique à l'environnement d'où tu travailles (soit live, soit local) et les informations ci-dessous sont celles en local.
// Par contre, si tu ouvres le fichier includes/config.php sur ton FTP, tu verras que c'est pas du tout le même.
// Déjà, à partir du moment où tu n'as pas de mot de passe pour te connecter à la base, c'est que c'est sûrement pas de la production ;) rrrddddddddddddddddd$d

const DB_HOST = "localhost"; // L'hôte de la DB
const DB_USER = "root"; // L'utilisateur de la DB
const DB_PASS = ""; // Le mot de passe de la DB
const DB_BASE = "forum"; // La nom de la base de données
?>