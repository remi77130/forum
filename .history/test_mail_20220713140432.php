<?php

$destinataire = "sandra.piccirillo@hotmail.fr"; // DEST DU MAIL
$sujet = "Biensur";
$message = "Oui j'imprime ta feuille :)";

$headers = "From:hguv5320@hguv5320.odns.fr"; 
mail($destinataire,$sujet,$message,$headers);


echo "mail envoyer à $destinataire avec succes ! ";  


?>