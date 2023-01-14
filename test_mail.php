<?php

$destinataire = "projetpro77@gmail.com"; // DEST DU MAIL
$sujet = "Biensur";
$message = "Oui j'imprime ta feuille :)";

$headers = "From:support@hguv5320.odns.fr"; 
mail($destinataire,$sujet,$message,$headers);


echo "mail envoyer à $destinataire avec succes ! ";  


?>