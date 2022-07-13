<?php

require 'require/database.php';

if(isset($_GET['token']) && $_GET['token'] != '')

{

    $stmt = $bdd->prepare('SELECT mail FROM membres WHERE token = ?');
    $stmt->execute([$_GET['token']]);
    $mail = $stmt->fetchColumn(); // RECUP LA PREMIERE COLONNE DE LA REQUETE 'PREPARE'

    if($mail)
    { ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Récupération du mot de passe </title>
        </head>
        <body>
            <form method="post">

            <label for="newPassword">Nouveau mdp:</label>
            <input type="password" name="newPassword"> <br>
            <input type="submit" value="Confirmer">
            



            </form>
        </body>
        </html>


        <?php
    }
}

if(isset($_POST['newPassword']))
{
    $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $sql = "UPDATE membres SET mdp = ? WHERE mail = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$hashedPassword, $_POST['mail']]);
    
    echo "Password modify successfully !";

}